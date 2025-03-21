# 👀 Información de un estatus de partido

```
[GET] /v1/status/matches/@id
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del estatus de partido. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/status/matches/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "273f5349-c38c-4e71-acfe-757595aa78de",
    "name": "playing",
    "description": "En juego",
    "created_at": "2025-03-18 14:29:06",
    "updated_at": "2025-03-18 14:29:06"
  },
  "status": 200,
  "description": "Information about the match status"
}
```
