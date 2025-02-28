# Comprobar API key

```
[GET] /v1/auth/check
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/auth/check
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "1f611874-0f55-4ff9-8204-76134505d71c",
    "user_id": "70f7531a-21f6-482e-a0ef-875d9d050ed3",
    "is_revoked": 0,
    "expires_at": "2025-02-21 20:25:21",
    "created_at": "2025-02-21 20:17:21",
    "updated_at": "2025-02-21 20:17:21"
  },
  "status": 200,
  "description": "Information about the API key"
}
```
