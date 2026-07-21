<?php

use App\Http\Controllers\Api\ChatCsvController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/get-json/{key}', function ($key) {
    header('Content-Type: application/json');
    if(!file_exists(public_path('json\\'.$key.'.json'))){
        return response()->json([
            'message' => 'File not found',
            'status' => 404
        ], 404);
    }
    $json = file_get_contents(public_path('json\\'.$key.'.json'));
    //json to array
    $json = json_decode($json, true);
    $api_key = $json["token"];
    if($api_key != ""){
        if(isset($_GET["api-key"])){
            if($_GET["api-key"] != $api_key){
                return response()->json([
                    'message' => 'Unauthorized',
                    'status' => 401
                ], 401);
            }
        }else{
            return response()->json([
                'message' => 'Unauthorized',
                'status' => 401
            ], 401);
        }
    }
    return json_decode($json["data"],true);
});

Route::prefix('chat')->group(function () {
    Route::post('/auth/register', [ChatCsvController::class, 'register']);
    Route::post('/auth/login', [ChatCsvController::class, 'login']);
    Route::post('/chats/{otherUserId}/messages', [ChatCsvController::class, 'sendMessage']);
    Route::get('/chats/{otherUserId}/messages', [ChatCsvController::class, 'lastMessages']);
});
