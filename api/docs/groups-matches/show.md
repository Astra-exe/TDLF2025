# Partidos de un grupo

```
[GET] /v1/groups/@id/matches
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del grupo. |

Ejemplo:

```bash
 curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/groups/@id/matches
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "3d27948c-6d99-4fb9-9ed5-753335be3218",
      "group_id": "1a912849-496e-4673-9ba2-7475f33ce48f",
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
    {
      "id": "5cd099d7-ff1a-4877-9fd0-6fb49252e3bb",
      "group_id": "1a912849-496e-4673-9ba2-7475f33ce48f",
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
    ...
  ],
  "status": 200,
  "description": "Information about the group matches"
}
```
