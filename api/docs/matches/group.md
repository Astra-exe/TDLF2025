# Grupo de un partido

```
[GET] /v1/matches/@id/groups
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
  http://localhost:8080/v1/matches/@id/groups
```

Respuesta de la petición:

```json
{
  "data": {
    "group": {
      "id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
      "name": "A_2025",
      "description": "A",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-20 21:27:39",
      "updated_at": "2025-03-20 21:27:39",
      "registration_category": {
        "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
        "name": "open",
        "description": "Libre"
      }
    },
    "relationship": {
      "id": "ce404089-6724-41db-8b13-e66f1e32ec7a",
      "group_id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
      "match_id": "b91a8d6b-9063-443d-a627-cc5e07fe6b2c",
      "created_at": "2025-03-20 21:27:39",
      "updated_at": "2025-03-20 21:27:39"
    }
  },
  "status": 200,
  "description": "Information about the match group"
}
```
