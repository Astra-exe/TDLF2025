# 🔑 Comprobar API key

```
[GET] /v1/auth/check
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/auth/check
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "d727a742-051c-41c3-95cb-561fb05b41f1",
    "user_id": "70f7531a-21f6-482e-a0ef-875d9d050ed3",
    "is_revoked": 0,
    "expires_at": "2025-02-28 15:55:56",
    "created_at": "2025-02-28 15:47:56",
    "updated_at": "2025-02-28 15:47:56"
  },
  "status": 200,
  "description": "Information about the API key"
}
```
