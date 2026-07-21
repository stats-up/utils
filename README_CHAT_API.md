# Chat API - Documentacion CSV

Este modulo de chat no usa base de datos. Toda la informacion se guarda en archivos CSV.

Incluye:

- autenticacion
- creacion de cuentas
- listado de usuarios
- envio de mensajes
- lectura de los ultimos 100 mensajes

## 1) Estructura de almacenamiento

Directorio base:

```text
storage/app/chat
```

Archivos de sistema:

- `storage/app/chat/users.csv`
- `storage/app/chat/sessions.csv`

Archivos de chat por usuarios:

- `storage/app/chat/chats/{id_menor}_{id_mayor}.csv`

Ejemplo:

- `317_542.csv`

La regla es siempre ordenar ids para evitar duplicados:

- `min(idA, idB)_max(idA, idB).csv`

## 2) Formato de CSV

### `users.csv`

Columnas:

- `id`
- `name`
- `email`
- `password_hash`
- `created_at`

### `sessions.csv`

Columnas:

- `token`
- `user_id`
- `created_at`

### `chats/{idA}_{idB}.csv`

Columnas:

- `id`
- `sender_user_id`
- `receiver_user_id`
- `message`
- `sent_at`

## 3) Endpoints

Base URL: 

```text
https://utils.statsup.cl/api/chat
```

### 3.1 Crear cuenta

`POST /api/chat/auth/register`

Body:

```json
{
  "name": "Juan Perez",
  "email": "juan@example.com",
  "password": "12345678",
  "password_confirmation": "12345678"
}
```

Respuesta `201`:

```json
{
  "message": "Account created",
  "data": {
    "id": 1,
    "name": "Juan Perez",
    "email": "juan@example.com"
  },
  "token": "TOKEN_GENERADO"
}
```

Errores:

- `409` email ya registrado
- `422` validacion

### 3.2 Login

`POST /api/chat/auth/login`

Body:

```json
{
  "email": "juan@example.com",
  "password": "12345678"
}
```

Respuesta `200`:

```json
{
  "message": "Login success",
  "token": "TOKEN_GENERADO",
  "data": {
    "id": 1,
    "name": "Juan Perez",
    "email": "juan@example.com"
  }
}
```

Errores:

- `401` credenciales invalidas
- `422` validacion

### 3.3 Enviar mensaje

### 3.3 Listar usuarios

`GET /api/chat/users?limit=100&q=juan&exclude_self=1`

Headers:

- `Authorization: Bearer TOKEN_GENERADO`

Reglas:

- `limit` por defecto `100`
- `limit` maximo `200`
- `q` es opcional (busca por nombre o email)
- `exclude_self=1` por defecto para no incluir tu propio usuario

Respuesta `200`:

```json
{
  "data": [
    {
      "id": 542,
      "name": "Maria Gomez",
      "email": "maria@example.com"
    }
  ],
  "meta": {
    "limit": 100,
    "count": 1,
    "query": "juan",
    "exclude_self": true
  }
}
```

Errores:

- `401` no autenticado

### 3.4 Enviar mensaje

`POST /api/chat/chats/{otherUserId}/messages`

Headers:

- `Authorization: Bearer TOKEN_GENERADO`

Body:

```json
{
  "message": "Hola, como vas?"
}
```

Respuesta `201`:

```json
{
  "message": "Message sent",
  "data": {
    "id": "1",
    "sender_user_id": "317",
    "receiver_user_id": "542",
    "message": "Hola, como vas?",
    "sent_at": "2026-07-20T14:10:00+00:00"
  },
  "chat_file": "317_542.csv"
}
```

Errores:

- `401` no autenticado
- `404` receptor no existe
- `422` validacion o ids invalidos

### 3.5 Ultimos 100 mensajes

`GET /api/chat/chats/{otherUserId}/messages?limit=100&before_id=200`

Headers:

- `Authorization: Bearer TOKEN_GENERADO`

Reglas:

- `limit` por defecto `100`
- `limit` maximo `100`
- `before_id` es opcional para paginar hacia atras

Respuesta `200`:

```json
{
  "chat_file": "317_542.csv",
  "data": [
    {
      "id": "101",
      "sender_user_id": "317",
      "receiver_user_id": "542",
      "message": "mensaje",
      "sent_at": "2026-07-20T14:10:00+00:00"
    }
  ],
  "meta": {
    "limit": 100,
    "has_more": true,
    "next_before_id": 2
  }
}
```

## 4) Notas operativas

- El sistema crea automaticamente los CSV al primer uso.
- Las contrasenas se guardan como hash (`password_hash`).
- No depende de migraciones ni conexion a DB.
