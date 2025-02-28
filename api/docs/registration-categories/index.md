# Categorías de inscripción

Categorías de inscripción de las parejas.

```
[GET] /v1/categories/registrations
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/categories/registrations
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "ecaead17-4b03-4aac-9610-707f7a06bef3",
      "name": "open",
      "description": "Categoría libre",
      "created_at": "2025-02-19 19:26:13",
      "updated_at": "2025-02-19 19:26:13"
    },
    {
      "id": "6b7c4097-73c2-4fb8-a4a1-b0c67f9ce27b",
      "name": "seniors",
      "description": "Categoría para 50 y más",
      "created_at": "2025-02-19 19:26:13",
      "updated_at": "2025-02-19 19:26:13"
    }
  ],
  "status": 200,
  "description": "Information about all the categories of pairs players registration"
}
```
