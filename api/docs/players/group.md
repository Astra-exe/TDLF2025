# Grupo de un jugador

```
[GET] /v1/players/@id/groups
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del jugador. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/players/@id/groups
```

Respuesta de la petición:

```json
{
  "data": {
    "group": {
      "id": "5a478de5-5be1-482f-8d44-b98a79d1552c",
      "name": "A_2025",
      "description": "A",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-18 14:41:31",
      "updated_at": "2025-03-18 14:41:31",
      "registration_category": {
        "id": "eb69a503-6eb3-4f20-b30b-c9a4762a8cfd",
        "name": "seniors",
        "description": "50 y más"
      }
    },
    "relationship_pair_player": {
      "id": "e0eb2e6a-4a07-4434-b6dc-7b65620f19c3",
      "player_id": "23b96bfe-b43c-4dd9-8a9e-0f7cd3d019fe",
      "pair_id": "087a1273-19c8-4ccf-8751-b2db6811f1cc",
      "created_at": "2025-03-18 14:40:07",
      "updated_at": "2025-03-18 14:40:07"
    },
    "relationship_group_pair": {
      "id": "d573b626-36e1-46fc-90ab-3adb51f0acb6",
      "pair_id": "087a1273-19c8-4ccf-8751-b2db6811f1cc",
      "group_id": "5a478de5-5be1-482f-8d44-b98a79d1552c",
      "created_at": "2025-03-18 14:41:31",
      "updated_at": "2025-03-18 14:41:31"
    }
  },
  "status": 200,
  "description": "Information about the player group"
}
```
