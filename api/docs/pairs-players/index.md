# 👫 + 🏃‍♂️ Parejas y jugadores

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
  http://localhost:8080/v1/pairs/players?page=2&orderBy=created_at&sortBy=desc&registration_category_id=aacace26-65b6-4ac9-8e7c-fcb32061c3fd&is_eliminated=true&is_active=true
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "pair": {
        "id": "4f473639-0ad1-4984-b02a-1861d1c43324",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-22 13:02:03",
        "updated_at": "2025-03-22 13:02:03",
        "registration_category": {
          "id": "aacace26-65b6-4ac9-8e7c-fcb32061c3fd",
          "name": "seniors",
          "description": "50 y más"
        }
      },
      "players": [
        {
          "player": {
            "id": "9afee6a9-a06f-43fd-b926-d41a2d951ead",
            "fullname": "Nery Contreras",
            "city": "Morelia",
            "weight": "86.00",
            "height": "1.69",
            "age": 60,
            "experience": 20,
            "is_active": 1,
            "created_at": "2025-03-22 11:15:23",
            "updated_at": "2025-03-22 11:15:23"
          },
          "relationship": {
            "id": "66b98335-a110-4da2-895e-1d061b0041d1",
            "player_id": "9afee6a9-a06f-43fd-b926-d41a2d951ead",
            "pair_id": "4f473639-0ad1-4984-b02a-1861d1c43324",
            "created_at": "2025-03-22 13:02:03",
            "updated_at": "2025-03-22 13:02:03"
          }
        },
        {
          "player": {
            "id": "75d132ab-31b7-400d-932c-647060aba8b1",
            "fullname": "José Gpe Fierros",
            "city": "Morelia",
            "weight": "76.00",
            "height": "1.76",
            "age": 60,
            "experience": 17,
            "is_active": 1,
            "created_at": "2025-03-22 11:15:54",
            "updated_at": "2025-03-22 11:15:54"
          },
          "relationship": {
            "id": "217638ce-a42b-4bda-bcab-9e7fc43adf8b",
            "player_id": "75d132ab-31b7-400d-932c-647060aba8b1",
            "pair_id": "4f473639-0ad1-4984-b02a-1861d1c43324",
            "created_at": "2025-03-22 13:02:03",
            "updated_at": "2025-03-22 13:02:03"
          }
        }
      ]
    },
    {
      "pair": {
        "id": "5a93fab1-5470-4f4e-b36d-beb875f1a17f",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-22 13:01:43",
        "updated_at": "2025-03-22 13:01:43",
        "registration_category": {
          "id": "aacace26-65b6-4ac9-8e7c-fcb32061c3fd",
          "name": "seniors",
          "description": "50 y más"
        }
      },
      "players": [
        {
          "player": {
            "id": "2383a4ee-31df-4916-848d-7998b85bf333",
            "fullname": "Joaquin López",
            "city": "Morelia",
            "weight": "78.00",
            "height": "1.70",
            "age": 51,
            "experience": 15,
            "is_active": 1,
            "created_at": "2025-03-22 11:14:40",
            "updated_at": "2025-03-22 11:14:40"
          },
          "relationship": {
            "id": "70b41baa-fd50-4c7a-bf3a-df2858acb169",
            "player_id": "2383a4ee-31df-4916-848d-7998b85bf333",
            "pair_id": "5a93fab1-5470-4f4e-b36d-beb875f1a17f",
            "created_at": "2025-03-22 13:01:43",
            "updated_at": "2025-03-22 13:01:43"
          }
        },
        {
          "player": {
            "id": "864c9d65-cb15-474e-864f-b404b2ba702c",
            "fullname": "Salvador Farías",
            "city": "Morelia",
            "weight": "85.00",
            "height": "1.74",
            "age": 58,
            "experience": 20,
            "is_active": 1,
            "created_at": "2025-03-22 11:15:02",
            "updated_at": "2025-03-22 11:15:02"
          },
          "relationship": {
            "id": "a3826553-ff57-49f9-9701-ed850ffc967e",
            "player_id": "864c9d65-cb15-474e-864f-b404b2ba702c",
            "pair_id": "5a93fab1-5470-4f4e-b36d-beb875f1a17f",
            "created_at": "2025-03-22 13:01:43",
            "updated_at": "2025-03-22 13:01:43"
          }
        }
      ]
    },
    ...
  ],
  "status": 200,
  "pagination": {
    "page": 1,
    "limit": 8,
    "total": 6,
    "count": 48,
    "offset": 0
  },
  "description": "Information about all the pairs players with pagination"
}
```
