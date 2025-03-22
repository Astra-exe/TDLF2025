# 🎾 Partidos de un grupo

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
      "match": {
        "id": "0f5fed47-79d3-4428-bb3e-a3e69d196bdf",
        "is_active": 1,
        "created_at": "2025-03-20 21:27:39",
        "updated_at": "2025-03-20 21:27:39",
        "registration_category": {
          "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
          "name": "open",
          "description": "Libre"
        },
        "match_category": {
          "id": "ad14f6d0-5296-4a6e-a986-6a99a20365b7",
          "name": "qualifier",
          "description": "Clasificación"
        },
        "match_status": {
          "id": "b06b08ff-0f65-456c-ae90-3dd740a26c9b",
          "name": "scheduled",
          "description": "Programado"
        }
      },
      "relationship": {
        "id": "8779d8d2-dcab-42f7-a886-2f855224b72c",
        "group_id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
        "match_id": "0f5fed47-79d3-4428-bb3e-a3e69d196bdf",
        "created_at": "2025-03-20 21:27:39",
        "updated_at": "2025-03-20 21:27:39"
      }
    },
    {
      "match": {
        "id": "5ef5e266-002f-4934-a11a-3fcb18d53394",
        "is_active": 1,
        "created_at": "2025-03-20 21:27:39",
        "updated_at": "2025-03-20 21:27:39",
        "registration_category": {
          "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
          "name": "open",
          "description": "Libre"
        },
        "match_category": {
          "id": "ad14f6d0-5296-4a6e-a986-6a99a20365b7",
          "name": "qualifier",
          "description": "Clasificación"
        },
        "match_status": {
          "id": "b06b08ff-0f65-456c-ae90-3dd740a26c9b",
          "name": "scheduled",
          "description": "Programado"
        }
      },
      "relationship": {
        "id": "4e68dbaa-759e-47f0-a300-6b0630fe4d26",
        "group_id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
        "match_id": "5ef5e266-002f-4934-a11a-3fcb18d53394",
        "created_at": "2025-03-20 21:27:39",
        "updated_at": "2025-03-20 21:27:39"
      }
    },
    ...
  ],
  "status": 200,
  "description": "Information about the group matches"
}
```
