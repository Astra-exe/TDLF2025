# 👀 Información de una categoría de partido

```
[GET] /v1/categories/matches/@id
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador de la categoría de partido. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/categories/matches/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "6c7f2686-7b40-47ff-b5b5-cbd52c6cea89",
    "name": "qualifier",
    "description": "Clasificación",
    "created_at": "2025-03-18 14:29:06",
    "updated_at": "2025-03-18 14:29:06"
  },
  "status": 200,
  "description": "Information about the match category"
}
```
