<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ChatCsvController extends Controller
{
    /**
     * Register a new chat user and issue a token.
     */
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:190',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $this->ensureChatStorage();
        $users = $this->readCsvAssoc($this->usersFilePath());

        foreach ($users as $existingUser) {
            if (isset($existingUser['email']) && mb_strtolower($existingUser['email']) === mb_strtolower($request->input('email'))) {
                return response()->json([
                    'message' => 'Email already registered',
                ], 409);
            }
        }

        $newUser = [
            'id' => (string) $this->nextId($users),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password_hash' => password_hash($request->input('password'), PASSWORD_BCRYPT),
            'created_at' => now()->toIso8601String(),
        ];

        $users[] = $newUser;
        $this->writeCsvAssoc($this->usersFilePath(), $users, ['id', 'name', 'email', 'password_hash', 'created_at']);

        $token = $this->issueToken((int) $newUser['id']);

        return response()->json([
            'message' => 'Account created',
            'data' => $this->publicUser($newUser),
            'token' => $token,
        ], 201);
    }

    /**
     * Login and issue a token.
     */
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $this->ensureChatStorage();
        $users = $this->readCsvAssoc($this->usersFilePath());

        $user = null;
        foreach ($users as $existingUser) {
            if (isset($existingUser['email']) && mb_strtolower($existingUser['email']) === mb_strtolower($request->input('email'))) {
                $user = $existingUser;
                break;
            }
        }

        if (!$user || !isset($user['password_hash']) || !password_verify($request->input('password'), $user['password_hash'])) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = $this->issueToken((int) $user['id']);

        return response()->json([
            'message' => 'Login success',
            'token' => $token,
            'data' => $this->publicUser($user),
        ]);
    }

    /**
     * Send a message to another user. Chat file name format: minId_maxId.csv
     */
    public function sendMessage(Request $request, $otherUserId): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $authUser = $this->authenticatedUser($request);
        if (!$authUser) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $senderId = (int) $authUser['id'];
        $receiverId = (int) $otherUserId;

        if ($receiverId <= 0 || $receiverId === $senderId) {
            return response()->json([
                'message' => 'Invalid receiver user id',
            ], 422);
        }

        $receiver = $this->findUserById($receiverId);
        if (!$receiver) {
            return response()->json([
                'message' => 'Receiver user not found',
            ], 404);
        }

        $chatPath = $this->chatFilePath($senderId, $receiverId);
        $messages = $this->readCsvAssoc($chatPath);

        $newMessage = [
            'id' => (string) $this->nextId($messages),
            'sender_user_id' => (string) $senderId,
            'receiver_user_id' => (string) $receiverId,
            'message' => $request->input('message'),
            'sent_at' => now()->toIso8601String(),
        ];

        $messages[] = $newMessage;
        $this->writeCsvAssoc($chatPath, $messages, ['id', 'sender_user_id', 'receiver_user_id', 'message', 'sent_at']);

        return response()->json([
            'message' => 'Message sent',
            'data' => $newMessage,
            'chat_file' => basename($chatPath),
        ], 201);
    }

    /**
     * Get latest messages from chat with another user.
     */
    public function lastMessages(Request $request, $otherUserId): JsonResponse
    {
        $authUser = $this->authenticatedUser($request);
        if (!$authUser) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $selfId = (int) $authUser['id'];
        $peerId = (int) $otherUserId;

        if ($peerId <= 0 || $peerId === $selfId) {
            return response()->json([
                'message' => 'Invalid chat user id',
            ], 422);
        }

        $peer = $this->findUserById($peerId);
        if (!$peer) {
            return response()->json([
                'message' => 'Chat user not found',
            ], 404);
        }

        $limit = (int) $request->query('limit', 100);
        if ($limit <= 0) {
            $limit = 100;
        }
        if ($limit > 100) {
            $limit = 100;
        }

        $beforeId = $request->query('before_id');
        $beforeId = is_null($beforeId) ? null : (int) $beforeId;

        $chatPath = $this->chatFilePath($selfId, $peerId);
        $messages = $this->readCsvAssoc($chatPath);

        if (!is_null($beforeId) && $beforeId > 0) {
            $messages = array_values(array_filter($messages, function ($item) use ($beforeId) {
                return isset($item['id']) && (int) $item['id'] < $beforeId;
            }));
        }

        usort($messages, function ($left, $right) {
            return ((int) $right['id']) <=> ((int) $left['id']);
        });

        $window = array_slice($messages, 0, $limit + 1);
        $hasMore = count($window) > $limit;
        $window = array_slice($window, 0, $limit);

        $nextBeforeId = null;
        if (!empty($window)) {
            $lastRow = end($window);
            $nextBeforeId = (int) $lastRow['id'];
        }

        $orderedMessages = array_reverse($window);

        return response()->json([
            'chat_file' => basename($chatPath),
            'data' => $orderedMessages,
            'meta' => [
                'limit' => $limit,
                'has_more' => $hasMore,
                'next_before_id' => $hasMore ? $nextBeforeId : null,
            ],
        ]);
    }

    private function authenticatedUser(Request $request): ?array
    {
        $token = $this->bearerToken($request);
        if (!$token) {
            return null;
        }

        $this->ensureChatStorage();
        $sessions = $this->readCsvAssoc($this->sessionsFilePath());

        $userId = null;
        foreach ($sessions as $session) {
            if (($session['token'] ?? '') === $token) {
                $userId = isset($session['user_id']) ? (int) $session['user_id'] : null;
                break;
            }
        }

        if (!$userId) {
            return null;
        }

        return $this->findUserById($userId);
    }

    private function issueToken(int $userId): string
    {
        $token = Str::random(80);
        $sessions = $this->readCsvAssoc($this->sessionsFilePath());
        $sessions[] = [
            'token' => $token,
            'user_id' => (string) $userId,
            'created_at' => now()->toIso8601String(),
        ];

        $this->writeCsvAssoc($this->sessionsFilePath(), $sessions, ['token', 'user_id', 'created_at']);

        return $token;
    }

    private function findUserById(int $userId): ?array
    {
        $users = $this->readCsvAssoc($this->usersFilePath());
        foreach ($users as $user) {
            if (isset($user['id']) && (int) $user['id'] === $userId) {
                return $user;
            }
        }

        return null;
    }

    private function publicUser(array $user): array
    {
        return [
            'id' => isset($user['id']) ? (int) $user['id'] : null,
            'name' => $user['name'] ?? '',
            'email' => $user['email'] ?? '',
        ];
    }

    private function bearerToken(Request $request): ?string
    {
        $header = $request->header('Authorization', '');
        if (stripos($header, 'Bearer ') !== 0) {
            return null;
        }

        $token = trim(substr($header, 7));
        return $token !== '' ? $token : null;
    }

    private function chatBaseDir(): string
    {
        return storage_path('app/chat');
    }

    private function chatsDir(): string
    {
        return $this->chatBaseDir() . DIRECTORY_SEPARATOR . 'chats';
    }

    private function usersFilePath(): string
    {
        return $this->chatBaseDir() . DIRECTORY_SEPARATOR . 'users.csv';
    }

    private function sessionsFilePath(): string
    {
        return $this->chatBaseDir() . DIRECTORY_SEPARATOR . 'sessions.csv';
    }

    private function chatFilePath(int $userA, int $userB): string
    {
        $left = min($userA, $userB);
        $right = max($userA, $userB);

        return $this->chatsDir() . DIRECTORY_SEPARATOR . $left . '_' . $right . '.csv';
    }

    private function ensureChatStorage(): void
    {
        if (!is_dir($this->chatBaseDir())) {
            mkdir($this->chatBaseDir(), 0775, true);
        }

        if (!is_dir($this->chatsDir())) {
            mkdir($this->chatsDir(), 0775, true);
        }

        if (!file_exists($this->usersFilePath())) {
            $this->writeCsvAssoc($this->usersFilePath(), [], ['id', 'name', 'email', 'password_hash', 'created_at']);
        }

        if (!file_exists($this->sessionsFilePath())) {
            $this->writeCsvAssoc($this->sessionsFilePath(), [], ['token', 'user_id', 'created_at']);
        }
    }

    private function readCsvAssoc(string $path): array
    {
        if (!file_exists($path)) {
            return [];
        }

        $handle = fopen($path, 'r');
        if ($handle === false) {
            return [];
        }

        $headers = fgetcsv($handle);
        if (!$headers) {
            fclose($handle);
            return [];
        }

        $rows = [];
        while (($line = fgetcsv($handle)) !== false) {
            if ($line === [null] || $line === false) {
                continue;
            }

            $row = [];
            foreach ($headers as $index => $header) {
                $row[$header] = $line[$index] ?? '';
            }
            $rows[] = $row;
        }

        fclose($handle);

        return $rows;
    }

    private function writeCsvAssoc(string $path, array $rows, array $headers): void
    {
        $dir = dirname($path);
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $handle = fopen($path, 'w');
        if ($handle === false) {
            return;
        }

        if (flock($handle, LOCK_EX)) {
            fputcsv($handle, $headers);

            foreach ($rows as $row) {
                $outputRow = [];
                foreach ($headers as $header) {
                    $outputRow[] = $row[$header] ?? '';
                }

                fputcsv($handle, $outputRow);
            }

            flock($handle, LOCK_UN);
        }

        fclose($handle);
    }

    private function nextId(array $rows): int
    {
        $maxId = 0;
        foreach ($rows as $row) {
            $current = isset($row['id']) ? (int) $row['id'] : 0;
            if ($current > $maxId) {
                $maxId = $current;
            }
        }

        return $maxId + 1;
    }
}
