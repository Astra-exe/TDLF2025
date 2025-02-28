# Roles

Roles de los usuarios de acceso.

```
[GET] /v1/roles
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/roles
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "f168ee93-342a-4a90-992a-1e75050e57e2",
      "name": "admin",
      "description": "Administrador",
      "created_at": "2025-02-19 22:21:44",
      "updated_at": "2025-02-19 22:21:44"
    },
    {
      "id": "7946feb1-21ac-4126-a5f1-b04bcf86516c",
      "name": "reader",
      "description": "Solo lectura",
      "created_at": "2025-02-19 22:21:44",
      "updated_at": "2025-02-19 22:21:44"
    },
    {
      "id": "23ec595b-2993-4d48-bf89-d582037dced0",
      "name": "web",
      "description": "Sitio web",
      "created_at": "2025-02-19 22:21:44",
      "updated_at": "2025-02-19 22:21:44"
    }
  ],
  "status": 200,
  "description": "Information about all access user roles"
}
```
