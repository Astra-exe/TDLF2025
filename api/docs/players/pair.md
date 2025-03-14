# Pareja de un jugador

```
[GET] /v1/players/@id/pairs
```

Parámetros de la petición:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del jugador. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/players/@id/pairs
```

Respuesta de la petición:

```json
{
  "data": {
    "pair": {
      "id": "98eaa36b-98e1-4842-80d3-771627af3458",
      "is_eliminated": 0,
      "created_at": "2025-03-07 14:44:28",
      "updated_at": "2025-03-07 14:44:28",
      "registration_category": {
        "id": "15134933-1932-4df4-bb5a-b304774b229c",
        "name": "open",
        "description": "Libre"
      }
    },
    "relationship": {
      "id": "64c27726-0281-45fe-9d79-9cdf9f32c2eb",
      "player_id": "07b80796-fd26-4b1b-9f5d-6330e96ed849",
      "pair_id": "98eaa36b-98e1-4842-80d3-771627af3458",
      "created_at": "2025-03-07 14:44:28",
      "updated_at": "2025-03-07 14:44:28"
    }
  },
  "status": 200,
  "description": "Information about the player pair"
}
```
