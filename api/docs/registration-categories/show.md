# Información de una categoría de inscripción

```
[GET] /v1/categories/registrations/@id
```

Parámetros de la petición:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador de la categoría de inscripción. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/categories/registrations/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "15134933-1932-4df4-bb5a-b304774b229c",
    "name": "open",
    "description": "Libre",
    "created_at": "2025-03-07 14:38:11",
    "updated_at": "2025-03-07 14:38:11"
  },
  "status": 200,
  "description": "Information about the registration category of pairs players"
}
```
