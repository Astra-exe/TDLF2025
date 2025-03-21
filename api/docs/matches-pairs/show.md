# 👀 Parejas de un partido

```
[GET] /v1/matches/@id/pairs
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
  http://localhost:8080/v1/matches/@id/pairs
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "pair": {
        "id": "46197c3b-aa33-4f59-b194-4f3ce08f83c5",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-18 14:40:07",
        "updated_at": "2025-03-18 14:40:07",
        "registration_category": {
          "id": "eb69a503-6eb3-4f20-b30b-c9a4762a8cfd",
          "name": "seniors",
          "description": "50 y más"
        }
      },
      "relationship": {
        "id": "06928e67-a024-427c-ae4f-2dd940949aa3",
        "pair_id": "46197c3b-aa33-4f59-b194-4f3ce08f83c5",
        "match_id": "218574e0-759c-4d01-be9a-0e83d6dd2365",
        "score": 0,
        "is_winner": 0,
        "created_at": "2025-03-18 14:41:31",
        "updated_at": "2025-03-18 14:41:31"
      }
    },
    {
      "pair": {
        "id": "2a7b7e6d-23fc-4aa6-b6e1-1289afc97625",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-18 14:40:07",
        "updated_at": "2025-03-18 14:40:07",
        "registration_category": {
          "id": "eb69a503-6eb3-4f20-b30b-c9a4762a8cfd",
          "name": "seniors",
          "description": "50 y más"
        }
      },
      "relationship": {
        "id": "0d620997-636a-477c-a666-42e20d36d249",
        "pair_id": "2a7b7e6d-23fc-4aa6-b6e1-1289afc97625",
        "match_id": "218574e0-759c-4d01-be9a-0e83d6dd2365",
        "score": 0,
        "is_winner": 0,
        "created_at": "2025-03-18 14:41:31",
        "updated_at": "2025-03-18 14:41:31"
      }
    }
  ],
  "status": 200,
  "description": "Information about the match pairs"
}
```
