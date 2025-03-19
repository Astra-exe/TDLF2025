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
    "id": "2f0a8d32-0e8e-47a8-a7d5-5518150840a4",
    "name": "A_2025",
    "description": "A",
    "is_eliminated": 0,
    "is_active": 1,
    "created_at": "2025-03-18 14:41:31",
    "updated_at": "2025-03-18 14:41:31",
    "registration_category": {
      "id": "76d95a95-0fa3-4d58-a8ce-031a1db25b3c",
      "name": "open",
      "description": "Libre"
    }
  },
  "status": 200,
  "description": "Information about the match group"
}
```
