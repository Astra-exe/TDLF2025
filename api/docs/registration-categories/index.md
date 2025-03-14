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
      "id": "15134933-1932-4df4-bb5a-b304774b229c",
      "name": "open",
      "description": "Libre",
      "created_at": "2025-03-07 14:38:11",
      "updated_at": "2025-03-07 14:38:11"
    },
    {
      "id": "810f3713-ca58-4f11-99c1-db40edb58ab7",
      "name": "seniors",
      "description": "50 y más",
      "created_at": "2025-03-07 14:38:11",
      "updated_at": "2025-03-07 14:38:11"
    }
  ],
  "status": 200,
  "description": "Information about all the categories of pairs players registration"
}
```
