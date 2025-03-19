# Información de un partido

```
[GET] /v1/matches/@id
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del partido. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/matches/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "0ffe3275-808c-4d65-b68a-767135f1ea6c",
    "group_id": "2f0a8d32-0e8e-47a8-a7d5-5518150840a4",
    "is_active": 1,
    "created_at": "2025-03-18 14:41:31",
    "updated_at": "2025-03-18 14:41:31",
    "registration_category": {
      "id": "76d95a95-0fa3-4d58-a8ce-031a1db25b3c",
      "name": "open",
      "description": "Libre"
    },
    "match_category": {
      "id": "6c7f2686-7b40-47ff-b5b5-cbd52c6cea89",
      "name": "qualifier",
      "description": "Clasificación"
    },
    "match_status": {
      "id": "29d4b630-468f-4dcc-b775-5bad0b796a89",
      "name": "scheduled",
      "description": "Programado"
    }
  },
  "status": 200,
  "description": "Information about the match"
}
```
