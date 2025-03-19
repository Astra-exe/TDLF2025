# Información de un rol

```
[GET] /v1/roles/@id
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del rol. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/roles/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "ff23a6f7-0862-4431-b3b3-015beae0cb9f",
    "name": "admin",
    "description": "Administrador",
    "created_at": "2025-03-07 14:38:11",
    "updated_at": "2025-03-07 14:38:11"
  },
  "status": 200,
  "description": "Information about the access user role"
}
```
