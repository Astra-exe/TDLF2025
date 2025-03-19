# Información de un grupo

```
[GET] /v1/groups/@id
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
  http://localhost:8080/v1/groups/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "b77966a1-42b4-478c-b145-4ff0e4a248ed",
    "name": "A_2025",
    "description": "A",
    "is_eliminated": 0,
    "is_active": 1,
    "created_at": "2025-03-18 01:59:28",
    "updated_at": "2025-03-18 01:59:28",
    "registration_category": {
      "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
      "name": "open",
      "description": "Libre"
    }
  },
  "status": 200,
  "description": "Information about the group"
}
```
