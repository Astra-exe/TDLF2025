# ⏳ / 🎾 Estatus de los partidos

Estatus de juego de los partidos.

```
[GET] /v1/status/matches
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/status/matches
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "273f5349-c38c-4e71-acfe-757595aa78de",
      "name": "playing",
      "description": "En juego",
      "created_at": "2025-03-18 14:29:06",
      "updated_at": "2025-03-18 14:29:06"
    },
    {
      "id": "85612c7a-9dba-492a-84d0-b8c2c1fff166",
      "name": "finalized",
      "description": "Finalizado",
      "created_at": "2025-03-18 14:29:06",
      "updated_at": "2025-03-18 14:29:06"
    },
    {
      "id": "29d4b630-468f-4dcc-b775-5bad0b796a89",
      "name": "scheduled",
      "description": "Programado",
      "created_at": "2025-03-18 14:29:06",
      "updated_at": "2025-03-18 14:29:06"
    }
  ],
  "status": 200,
  "description": "Information about all the matches status"
}
```
