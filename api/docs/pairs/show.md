# Información de una pareja

```
[GET] /v1/pairs/@id
```

Parámetros de la petición:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador de la pareja. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/pairs/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "8636016a-1242-470d-a34f-49534f5ec22c",
    "registration_category_id": "ecaead17-4b03-4aac-9610-707f7a06bef3",
    "is_eliminated": 0,
    "created_at": "2025-02-28 13:09:49",
    "updated_at": "2025-02-28 13:09:49"
  },
  "status": 200,
  "description": "Information about the pair"
}
```
