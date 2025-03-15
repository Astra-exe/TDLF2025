# Roles

Roles de los usuarios de acceso.

```
[GET] /v1/roles
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/roles
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "ff23a6f7-0862-4431-b3b3-015beae0cb9f",
      "name": "admin",
      "description": "Administrador",
      "created_at": "2025-03-07 14:38:11",
      "updated_at": "2025-03-07 14:38:11"
    },
    {
      "id": "e2498f8e-baf8-41b3-b51e-6636cbe1fae5",
      "name": "reader",
      "description": "Solo lectura",
      "created_at": "2025-03-07 14:38:11",
      "updated_at": "2025-03-07 14:38:11"
    },
    {
      "id": "34023d80-58cd-49f5-aef4-d12d39f21cb0",
      "name": "web",
      "description": "Sitio web",
      "created_at": "2025-03-07 14:38:11",
      "updated_at": "2025-03-07 14:38:11"
    }
  ],
  "status": 200,
  "description": "Information about all access user roles"
}
```
