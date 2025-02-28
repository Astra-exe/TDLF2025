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
    "id": "c453f7db-9606-4f2e-a335-619247389009",
    "registration_category_id": "59b675bb-4559-4748-8974-0753e716e8af",
    "is_eliminated": 0,
    "created_at": "2025-02-28 13:09:49",
    "updated_at": "2025-02-28 13:09:49"
  },
  "status": 200,
  "description": "Information about the pair"
}
```
