# 👀 Información de un jugador

```
[GET] /v1/players/@id
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del jugador. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/players/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "07b80796-fd26-4b1b-9f5d-6330e96ed849",
    "fullname": "Ricardo García Jiménez",
    "city": "Salvatierra",
    "weight": "120.00",
    "height": "1.82",
    "age": 26,
    "experience": 0,
    "is_active": 1,
    "created_at": "2025-03-07 14:44:28",
    "updated_at": "2025-03-07 14:44:28"
  },
  "status": 200,
  "description": "Information about the player"
}
```
