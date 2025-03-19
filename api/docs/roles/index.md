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
      "id": "1acc20ec-b070-4c93-be67-40dd206b2d5f",
      "name": "admin",
      "description": "Administrador",
      "created_at": "2025-03-18 14:29:06",
      "updated_at": "2025-03-18 14:29:06"
    },
    {
      "id": "c0bad9bb-092e-444b-98eb-d55b3cd1c72d",
      "name": "web",
      "description": "Sitio web",
      "created_at": "2025-03-18 14:29:06",
      "updated_at": "2025-03-18 14:29:06"
    },
    {
      "id": "61654117-62b1-445e-b258-83b807fcd25d",
      "name": "reader",
      "description": "Solo lectura",
      "created_at": "2025-03-18 14:29:06",
      "updated_at": "2025-03-18 14:29:06"
    }
  ],
  "status": 200,
  "description": "Information about all the access users roles"
}
```
