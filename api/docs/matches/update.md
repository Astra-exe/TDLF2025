# ✏️ Editar un partido

```
[PUT] /v1/matches/@id
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del partido. |

Cuerpo de la petición:

| Campo | Tipo | Requerido | Rango | Descripción |
| ----- | ---- | --------- | ----- | ----------- |
| `match_category_id` | `string` | `false` | `exact_len: 36` | Identificador de la categoría de la ronda del partido ([ver](../match-categories/index.html)). |
| `match_status_id` | `string` | `false` | `exact_len: 36`  | Identificador del estatus de juego del partido ([ver](../match-status/index.html)). |
| `is_active` | `boolean` | `false` | `contains: [yes/no, on/off, 1/0, true/false]` | Estatus de actividad del partido. |

Ejemplo:

```bash
curl -X PUT \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/matches/@id \
  -d '{
    "match_category_id": "91ee11b0-dd16-40e5-b0a5-a6bb17c3938a",
    "match_status_id": "85612c7a-9dba-492a-84d0-b8c2c1fff166",
    "is_active": "0"
  }'
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "27113a35-baed-40b2-9af9-e0c261582b6a",
    "is_active": 0,
    "created_at": "2025-03-18 14:41:31",
    "updated_at": "2025-03-20 14:14:41",
    "registration_category": {
      "id": "76d95a95-0fa3-4d58-a8ce-031a1db25b3c",
      "name": "open",
      "description": "Libre"
    },
    "match_category": {
      "id": "91ee11b0-dd16-40e5-b0a5-a6bb17c3938a",
      "name": "eighths",
      "description": "Octavos de final"
    },
    "match_status": {
      "id": "85612c7a-9dba-492a-84d0-b8c2c1fff166",
      "name": "finalized",
      "description": "Finalizado"
    }
  },
  "status": 200,
  "description": "The match was updated successfully"
}
```
