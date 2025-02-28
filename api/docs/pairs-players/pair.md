# Pareja de un jugador

```
[GET] /v1/pairs/players/@id
```

Parámetros de la petición:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del jugador. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/pairs/players/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "a5688d29-37cf-4f62-b79e-9615b2d191ca",
    "player_id": "38241a34-a61f-44c0-97de-3ae297a6efa5",
    "pair_id": "8636016a-1242-470d-a34f-49534f5ec22c",
    "created_at": "2025-02-28 13:09:49",
    "updated_at": "2025-02-28 13:09:49"
  },
  "status": 200,
  "description": "Information about the player pair"
}
```
