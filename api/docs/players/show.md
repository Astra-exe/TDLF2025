# Información de un jugador

```
[GET] /v1/players/@id
```

Parámetros de la petición:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del jugador. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/players/@id
```

```json
{
  "data": {
    "id": "38241a34-a61f-44c0-97de-3ae297a6efa5",
    "fullname": "Ricardo García Jiménez",
    "city": "Salvatierra",
    "weight": "120.00",
    "height": "1.82",
    "age": 26,
    "experience": 0,
    "is_active": 1,
    "created_at": "2025-02-28 13:09:49",
    "updated_at": "2025-02-28 13:09:49"
  },
  "status": 200,
  "description": "Information about the player"
}
```
