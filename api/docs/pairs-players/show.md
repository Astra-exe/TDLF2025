# Jugadores de una pareja

```
[GET] /v1/pairs/@id/players
```

Parámetros de la petición:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador de la pareja. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/pairs/@id/players
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "player": {
        "id": "b7f22815-7082-41ac-9ba5-0e43022d7d5f",
        "fullname": "Juan José Ramírez López",
        "city": "Irapuato",
        "weight": "70.00",
        "height": "1.65",
        "age": 25,
        "experience": 5,
        "is_active": 1,
        "created_at": "2025-03-07 14:44:28",
        "updated_at": "2025-03-07 14:44:28"
      },
      "relationship": {
        "id": "1decc97f-29a4-4b5f-abcb-4427aeeaf7d0",
        "player_id": "b7f22815-7082-41ac-9ba5-0e43022d7d5f",
        "pair_id": "98eaa36b-98e1-4842-80d3-771627af3458",
        "created_at": "2025-03-07 14:44:28",
        "updated_at": "2025-03-07 14:44:28"
      }
    },
    {
      "player": {
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
      "relationship": {
        "id": "64c27726-0281-45fe-9d79-9cdf9f32c2eb",
        "player_id": "07b80796-fd26-4b1b-9f5d-6330e96ed849",
        "pair_id": "98eaa36b-98e1-4842-80d3-771627af3458",
        "created_at": "2025-03-07 14:44:28",
        "updated_at": "2025-03-07 14:44:28"
      }
    }
  ],
  "status": 200,
  "description": "Information about the pair players"
}
```
