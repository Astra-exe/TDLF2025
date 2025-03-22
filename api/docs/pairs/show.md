# 👀 Información de una pareja

```
[GET] /v1/pairs/@id
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador de la pareja. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/pairs/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "98eaa36b-98e1-4842-80d3-771627af3458",
    "is_eliminated": 0,
    "is_active": 1,
    "created_at": "2025-03-07 14:44:28",
    "updated_at": "2025-03-07 14:44:28",
    "registration_category": {
      "id": "15134933-1932-4df4-bb5a-b304774b229c",
      "name": "open",
      "description": "Libre"
    }
  },
  "status": 200,
  "description": "Information about the pair"
}
```
