# Categorías de los partidos

Categorías de las rondas de los partidos.

```
[GET] /v1/categories/matches
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/categories/matches
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "6c7f2686-7b40-47ff-b5b5-cbd52c6cea89",
      "name": "qualifier",
      "description": "Clasificación",
      "created_at": "2025-03-18 14:29:06",
      "updated_at": "2025-03-18 14:29:06"
    },
    {
      "id": "dc19c9bf-4339-4ed2-a603-5b2dd1058a6f",
      "name": "quarters",
      "description": "Cuartos de final",
      "created_at": "2025-03-18 14:29:06",
      "updated_at": "2025-03-18 14:29:06"
    },
    {
      "id": "9efe8408-b826-4f15-a383-1f00d47118a8",
      "name": "final",
      "description": "Final",
      "created_at": "2025-03-18 14:29:06",
      "updated_at": "2025-03-18 14:29:06"
    },
    {
      "id": "91ee11b0-dd16-40e5-b0a5-a6bb17c3938a",
      "name": "eighths",
      "description": "Octavos de final",
      "created_at": "2025-03-18 14:29:06",
      "updated_at": "2025-03-18 14:29:06"
    },
    {
      "id": "8cded9b8-4e7f-4def-b6ef-bd954e13c0df",
      "name": "semifinal",
      "description": "Semifinal",
      "created_at": "2025-03-18 14:29:06",
      "updated_at": "2025-03-18 14:29:06"
    }
  ],
  "status": 200,
  "description": "Information about all the matches categories"
}
```
