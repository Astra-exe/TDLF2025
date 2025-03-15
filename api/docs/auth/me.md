# Usuario autenticado

```
[GET] /v1/auth/me
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/auth/me
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "860c2dc9-23ff-46c7-96c1-7b9fe437d12b",
    "email": "ricardogj08@riseup.net",
    "username": "ricardogj08",
    "fullname": "Ricardo García Jiménez",
    "is_active": 1,
    "created_at": "2025-03-07 14:38:11",
    "updated_at": "2025-03-07 14:38:11",
    "role": {
      "id": "ff23a6f7-0862-4431-b3b3-015beae0cb9f",
      "name": "admin",
      "description": "Administrador"
    }
  },
  "status": 200,
  "description": "Information about the authenticated user"
}
```
