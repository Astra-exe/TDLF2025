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
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/categories/registrations/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "ecaead17-4b03-4aac-9610-707f7a06bef3",
    "name": "open",
    "description": "Categoría libre",
    "created_at": "2025-02-19 19:26:13",
    "updated_at": "2025-02-19 19:26:13"
  },
  "status": 200,
  "description": "Information about the registration category of pairs players"
}
```
