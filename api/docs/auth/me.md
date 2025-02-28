# Usuario autenticado

```
[GET] /v1/auth/me
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/auth/me
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "70f7531a-21f6-482e-a0ef-875d9d050ed3",
    "email": "ricardogj08@riseup.net",
    "username": "ricardogj08",
    "role_id": "f168ee93-342a-4a90-992a-1e75050e57e2",
    "fullname": "Ricardo García Jiménez",
    "is_active": 1,
    "created_at": "2025-02-20 15:11:07",
    "updated_at": "2025-02-20 15:11:07"
  },
  "status": 200,
  "description": "Information about the authenticated user"
}
```
