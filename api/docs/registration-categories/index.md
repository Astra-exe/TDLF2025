# Categorías de inscripción

Categorías de inscripción de las parejas.

```
[GET] /v1/categories/registrations
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/categories/registrations
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "eb69a503-6eb3-4f20-b30b-c9a4762a8cfd",
      "name": "seniors",
      "description": "50 y más",
      "created_at": "2025-03-18 14:29:06",
      "updated_at": "2025-03-18 14:29:06"
    },
    {
      "id": "76d95a95-0fa3-4d58-a8ce-031a1db25b3c",
      "name": "open",
      "description": "Libre",
      "created_at": "2025-03-18 14:29:06",
      "updated_at": "2025-03-18 14:29:06"
    }
  ],
  "status": 200,
  "description": "Information about all the categories of pairs players registration"
}
```
