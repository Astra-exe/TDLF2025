# Modificar la pareja de un partido

```
[PUT] /v1/matches/@matchId/pairs/@pairId
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `matchId` | `string` | `true` | Identificador del partido. |
| `pairId` | `string` | `true` | Identificador de la pareja. |

Cuerpo de la petición:

| Campo | Tipo | Requerido | Rango | Descripción |
| ----- | ---- | --------- | ----- | ----------- |
| `score` | `integer` | `false` | `between_numeric: [0, 255]` | Puntaje de la pareja en el partido. |
| `is_winner` | `boolean` | `false` | `contains: [yes/no, on/off, 1/0, true/false]` | Estatus de ganador de la pareja en el partido. |

Ejemplo:

```bash
curl -X PUT \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/matches/@matchId/pairs/@pairId \
  -d '{
    "score": "10",
    "experience": "5"
  }'
```

Respuesta de la petición:

```json
{
  "data": {
    "match": {
      "id": "27113a35-baed-40b2-9af9-e0c261582b6a",
      "group_id": "e58c7d88-1c0a-4476-b5eb-9b4b45d1a559",
      "is_active": 1,
      "created_at": "2025-03-18 14:41:31",
      "updated_at": "2025-03-20 14:17:04",
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
    "pair": {
      "id": "75de4f9a-726d-4eda-83aa-c42aa579691f",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-18 14:37:31",
      "updated_at": "2025-03-18 14:37:31",
      "registration_category": {
        "id": "76d95a95-0fa3-4d58-a8ce-031a1db25b3c",
        "name": "open",
        "description": "Libre"
      }
    },
    "relationship": {
      "id": "d54b558b-65b4-4e89-b463-7390ed90387f",
      "pair_id": "75de4f9a-726d-4eda-83aa-c42aa579691f",
      "match_id": "27113a35-baed-40b2-9af9-e0c261582b6a",
      "score": 10,
      "is_winner": 1,
      "created_at": "2025-03-18 14:41:31",
      "updated_at": "2025-03-20 16:48:33"
    }
  },
  "status": 200,
  "description": "The match pair was updated successfully"
}
```
