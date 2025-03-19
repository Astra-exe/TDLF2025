# Jugadores de las parejas

Parejas de jugadores.

```
[GET] /v1/pairs/players
```

Parámetros de consulta:

| Parámetro | Tipo | Rango | Por defecto | Descripción |
| --------- | ---- | ----- | ----------- | ----------- |
| `page` | `integer` | `min_numeric: 1` | `1` | Número de la página de resultados de las parejas con sus jugadores. |
| `orderBy` | `string` | `contains: [created_at, updated_at]` | `created_at` | Campo de ordenamiento de las parejas con sus jugadores. |
| `sortBy` | `string` | `contains: [asc, desc]` | `desc` | Modo de ordenamiento de las parejas con sus jugadores. |
| `registration_category_id` | `string` | `exact_len: 36` | `null` | Identificador de la categoría de inscripción de las parejas con sus jugadores ([ver](../registration-categories/index.html)). |
| `is_eliminated` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar las parejas con sus jugadores por estatus de eliminación. |
| `is_active` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar las parejas con sus jugadores por estatus de actividad. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/pairs/players?page=2&orderBy=created_at&sortBy=desc&registration_category_id=cba89529-0ba9-49e4-85ad-83e63c8e9d7e&is_eliminated=true&is_active=true
```

Respuesta de la petición:

```json
{
  "data": [
    [
      {
        "player": {
          "id": "8dd75662-436d-4998-9c6f-35a47437c2e8",
          "fullname": "Ricardo García Cruz",
          "city": "Salvatierra",
          "weight": "80.00",
          "height": "1.80",
          "age": 56,
          "experience": 10,
          "is_active": 1,
          "created_at": "2025-03-07 19:35:48",
          "updated_at": "2025-03-07 19:35:48"
        },
        "relationship": {
          "id": "477a65ef-ed1f-417c-8050-560831768513",
          "player_id": "8dd75662-436d-4998-9c6f-35a47437c2e8",
          "pair_id": "979bc756-1333-4d0b-8f09-e60f038d89e6",
          "created_at": "2025-03-07 19:35:48",
          "updated_at": "2025-03-07 19:35:48"
        }
      },
      {
        "player": {
          "id": "cb1a34d3-4924-42ad-a168-2fb4e29487f0",
          "fullname": "Guadalupe Jiménez Carmona",
          "city": "Salvatierra",
          "weight": "75.00",
          "height": "1.70",
          "age": 54,
          "experience": 2,
          "is_active": 1,
          "created_at": "2025-03-07 19:35:48",
          "updated_at": "2025-03-07 19:35:48"
        },
        "relationship": {
          "id": "83bef57e-562e-48b3-a505-0de1ecb7bf05",
          "player_id": "cb1a34d3-4924-42ad-a168-2fb4e29487f0",
          "pair_id": "979bc756-1333-4d0b-8f09-e60f038d89e6",
          "created_at": "2025-03-07 19:35:48",
          "updated_at": "2025-03-07 19:35:48"
        }
      }
    ],
    [
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
    ...
  ],
  "status": 200,
  "pagination": {
    "page": 1,
    "limit": 8,
    "total": 1,
    "count": 2,
    "offset": 0
  },
  "description": "Information about all the pairs players with pagination"
}
```
