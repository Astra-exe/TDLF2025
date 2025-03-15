# Crear una pareja

```
[POST] /v1/pairs
```

Cuerpo de la petición:

| Propiedades | Tipo | Requerido | Rango | Descripción |
| ----------- | ---- | --------- | ----- | ----------- |
| `registration_category_id` | `string` | `true` | `exact_len: 36` | Identificador de la categoría de inscripción de la pareja ([ver](../registration-categories/index.html)). |
| `players` | `array[players]` |  `true` | `array_size_equal: 2` | Una lista con los identificadores de los jugadores de la pareja ([ver](../players/index.html)). |

Ejemplo:

```bash
curl -X POST \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/pairs \
  -d '{
    "registration_category_id":"15134933-1932-4df4-bb5a-b304774b229c",
    "players":[
      "07b80796-fd26-4b1b-9f5d-6330e96ed849",
      "b7f22815-7082-41ac-9ba5-0e43022d7d5f"
    ]
  }'
```

Respuesta de la petición:

```json
{
  "data": {
    "pair": {
      "id": "e29a4226-cf35-48c8-b976-561ca79931f0",
      "is_eliminated": 0,
      "created_at": "2025-03-13 22:14:25",
      "updated_at": "2025-03-13 22:14:25",
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
          "id": "d1c0b3d6-4fe4-4047-b922-4b272cef4f4a",
          "player_id": "b7f22815-7082-41ac-9ba5-0e43022d7d5f",
          "pair_id": "e29a4226-cf35-48c8-b976-561ca79931f0",
          "created_at": "2025-03-13 22:14:25",
          "updated_at": "2025-03-13 22:14:25"
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
          "id": "fc14c42a-49ea-416c-a99c-a6eea0a040ea",
          "player_id": "07b80796-fd26-4b1b-9f5d-6330e96ed849",
          "pair_id": "e29a4226-cf35-48c8-b976-561ca79931f0",
          "created_at": "2025-03-13 22:14:25",
          "updated_at": "2025-03-13 22:14:25"
        }
      }
    ]
  },
  "status": 201,
  "description": "The pair was created successfully"
}
```
