# ➕ 🏃‍♂️ Crear una pareja con jugadores

```
[POST] /v1/pairs/players
```

Cuerpo de la petición:

| Propiedades | Tipo | Requerido | Rango | Descripción |
| ----------- | ---- | --------- | ----- | ----------- |
| `registration_category_id` | `string` | `true` | `exact_len: 36` | Identificador de la categoría de inscripción de la pareja ([ver](../registration-categories/index.html)). |
| `players` | `array[players]` |  `true` | `array_size_equal: 2` | Una lista con la información de los jugadores de la pareja ([ver](../players/create.html)). |

Ejemplo:

```bash
curl -X POST \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/pairs/players \
  -d '{
    "registration_category_id": "59b675bb-4559-4748-8974-0753e716e8af",
    "players": [
      {
        "fullname": "Ricardo García Jiménez",
        "city": "Salvatierra",
        "weight": 120,
        "height": 1.82,
        "age": 26,
        "experience": 0
      },
      {
        "fullname": "Juan José Ramírez López",
        "city": "Irapuato",
        "weight": 70,
        "height": 1.65,
        "age": 25,
        "experience": 5
      }
    ]
  }'
```

Respuesta de la petición:

```json
{
  "data": {
    "pair": {
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
    "players": [
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
    ]
  },
  "status": 201,
  "description": "The pair with players was created successfully"
}
```
