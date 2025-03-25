# 🎾 + 👫 + 🏃‍♂️ Partidos, parejas y jugadores

Parejas y jugadores de los partidos.

```
[GET] /v1/matches/pairs/players
```

Parámetros de consulta:

| Parámetro | Tipo | Rango | Por defecto | Descripción |
| --------- | ---- | ----- | ----------- | ----------- |
| `page` | `integer` | `min_numeric: 1` | `1` | Número de la página de resultados de los partidos con sus parejas y jugadores. |
| `orderBy` | `string` | `contains: [created_at, updated_at]` | `created_at` | Campo de ordenamiento de los partidos con sus parejas y jugadores. |
| `sortBy` | `string` | `contains: [asc, desc]` | `desc` | Modo de ordenamiento de los partidos con sus parejas y jugadores. |
| `registration_category_id` | `string` | `exact_len: 36` | `null` | Identificador de la categoría de inscripción de los partidos con sus parejas y jugadores ([ver](../registration-categories/index.html)). |
| `match_category_id` | `string` | `exact_len: 36` | `null` | Identificador de la categoría de las rondas de los partidos con sus parejas y jugadores ([ver](../match-categories/index.html)). |
| `match_status_id` | `string` | `exact_len: 36` | `null` | Identificador del estatus de juego de los partidos con sus parejas y jugadores ([ver](../match-status/index.html)). |
| `is_active` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar los partidos con sus parejas y jugadores por estatus de actividad. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/matches/pairs/players?page=2&orderBy=created_at&sortBy=desc&registration_category_id=76d95a95-0fa3-4d58-a8ce-031a1db25b3c&match_category_id=6c7f2686-7b40-47ff-b5b5-cbd52c6cea89&match_status_id=29d4b630-468f-4dcc-b775-5bad0b796a89&is_active=true
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "match": {
        "id": "59caca3c-e589-4b16-a2f9-6baad0f60da3",
        "is_active": 1,
        "created_at": "2025-03-22 03:21:42",
        "updated_at": "2025-03-22 03:21:42",
        "registration_category": {
          "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
          "name": "open",
          "description": "Libre"
        },
        "match_category": {
          "id": "ad14f6d0-5296-4a6e-a986-6a99a20365b7",
          "name": "qualifier",
          "description": "Clasificación"
        },
        "match_status": {
          "id": "b06b08ff-0f65-456c-ae90-3dd740a26c9b",
          "name": "scheduled",
          "description": "Programado"
        }
      },
      "pairs": [
        {
          "pair": {
            "id": "3f71b2f1-906c-4419-b464-666ec27ac98c",
            "is_eliminated": 0,
            "is_active": 1,
            "created_at": "2025-03-22 03:13:32",
            "updated_at": "2025-03-22 03:13:32",
            "registration_category": {
              "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
              "name": "open",
              "description": "Libre"
            },
            "players": [
              {
                "player": {
                  "id": "f93a0856-0289-435d-8e4d-e03f7e074c85",
                  "fullname": "Elena Morales",
                  "city": "Purísima del Rincón",
                  "weight": "64.00",
                  "height": "1.69",
                  "age": 23,
                  "experience": 5,
                  "is_active": 1,
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                },
                "relationship": {
                  "id": "6533cf0a-666f-4b56-bb1a-9929ea97691d",
                  "player_id": "f93a0856-0289-435d-8e4d-e03f7e074c85",
                  "pair_id": "3f71b2f1-906c-4419-b464-666ec27ac98c",
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                }
              },
              {
                "player": {
                  "id": "5fb2f36a-76c2-4ce0-8a01-75bc48bbaf35",
                  "fullname": "Diego Fernández",
                  "city": "Moroleón",
                  "weight": "77.00",
                  "height": "1.82",
                  "age": 27,
                  "experience": 8,
                  "is_active": 1,
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                },
                "relationship": {
                  "id": "792e4c9c-0a30-4a37-890e-03ea629dd49e",
                  "player_id": "5fb2f36a-76c2-4ce0-8a01-75bc48bbaf35",
                  "pair_id": "3f71b2f1-906c-4419-b464-666ec27ac98c",
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                }
              }
            ]
          },
          "relationship": {
            "id": "1c6a2058-1c49-48dd-9555-e7c493e6e9df",
            "pair_id": "3f71b2f1-906c-4419-b464-666ec27ac98c",
            "match_id": "59caca3c-e589-4b16-a2f9-6baad0f60da3",
            "score": 0,
            "is_winner": 0,
            "created_at": "2025-03-22 03:21:42",
            "updated_at": "2025-03-22 03:21:42"
          }
        },
        {
          "pair": {
            "id": "57f1a4fc-e84b-44e1-81ea-9a960cb076f2",
            "is_eliminated": 0,
            "is_active": 1,
            "created_at": "2025-03-22 03:13:32",
            "updated_at": "2025-03-22 03:13:32",
            "registration_category": {
              "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
              "name": "open",
              "description": "Libre"
            },
            "players": [
              {
                "player": {
                  "id": "0dd9bfe6-37e8-462b-98e9-00998f179950",
                  "fullname": "Mario Guzmán",
                  "city": "Salvatierra",
                  "weight": "79.20",
                  "height": "1.81",
                  "age": 34,
                  "experience": 15,
                  "is_active": 1,
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                },
                "relationship": {
                  "id": "47b77c4c-b7aa-43c9-aa8e-07ec144b0342",
                  "player_id": "0dd9bfe6-37e8-462b-98e9-00998f179950",
                  "pair_id": "57f1a4fc-e84b-44e1-81ea-9a960cb076f2",
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                }
              },
              {
                "player": {
                  "id": "7aa7a788-2105-49c9-8ec5-39947fd96fa6",
                  "fullname": "Sandra Paredes",
                  "city": "Jaral del Progreso",
                  "weight": "64.80",
                  "height": "1.68",
                  "age": 27,
                  "experience": 9,
                  "is_active": 1,
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                },
                "relationship": {
                  "id": "6113b73a-0a60-4fcc-8700-c559e84ad09b",
                  "player_id": "7aa7a788-2105-49c9-8ec5-39947fd96fa6",
                  "pair_id": "57f1a4fc-e84b-44e1-81ea-9a960cb076f2",
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                }
              }
            ]
          },
          "relationship": {
            "id": "b69c8053-4e68-447c-919a-57a3e28fd3ab",
            "pair_id": "57f1a4fc-e84b-44e1-81ea-9a960cb076f2",
            "match_id": "59caca3c-e589-4b16-a2f9-6baad0f60da3",
            "score": 0,
            "is_winner": 0,
            "created_at": "2025-03-22 03:21:42",
            "updated_at": "2025-03-22 03:21:42"
          }
        }
      ]
    },
    {
      "match": {
        "id": "69939649-23f6-4e8f-9cf3-4329cbeea1fe",
        "is_active": 1,
        "created_at": "2025-03-22 03:21:42",
        "updated_at": "2025-03-22 03:21:42",
        "registration_category": {
          "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
          "name": "open",
          "description": "Libre"
        },
        "match_category": {
          "id": "ad14f6d0-5296-4a6e-a986-6a99a20365b7",
          "name": "qualifier",
          "description": "Clasificación"
        },
        "match_status": {
          "id": "b06b08ff-0f65-456c-ae90-3dd740a26c9b",
          "name": "scheduled",
          "description": "Programado"
        }
      },
      "pairs": [
        {
          "pair": {
            "id": "e4c8b51b-a393-413d-913e-59d42748eb94",
            "is_eliminated": 0,
            "is_active": 1,
            "created_at": "2025-03-22 03:13:32",
            "updated_at": "2025-03-22 03:13:32",
            "registration_category": {
              "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
              "name": "open",
              "description": "Libre"
            },
            "players": [
              {
                "player": {
                  "id": "7c6982bf-5240-45e4-bded-4179aa189be6",
                  "fullname": "Fernando Guerra",
                  "city": "Villagrán",
                  "weight": "73.00",
                  "height": "1.77",
                  "age": 30,
                  "experience": 9,
                  "is_active": 1,
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                },
                "relationship": {
                  "id": "23a8cddb-65bc-4d30-b5b8-325300033bbf",
                  "player_id": "7c6982bf-5240-45e4-bded-4179aa189be6",
                  "pair_id": "e4c8b51b-a393-413d-913e-59d42748eb94",
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                }
              },
              {
                "player": {
                  "id": "f1bf3056-1b0d-4317-b493-d4710ab8f1d9",
                  "fullname": "Isabel Pérez",
                  "city": "Abasolo",
                  "weight": "60.00",
                  "height": "1.65",
                  "age": 26,
                  "experience": 6,
                  "is_active": 1,
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                },
                "relationship": {
                  "id": "c127db62-c0fb-47f5-ae5b-708e5d716913",
                  "player_id": "f1bf3056-1b0d-4317-b493-d4710ab8f1d9",
                  "pair_id": "e4c8b51b-a393-413d-913e-59d42748eb94",
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                }
              }
            ]
          },
          "relationship": {
            "id": "47d71212-0a0b-40a6-9484-a65d827055df",
            "pair_id": "e4c8b51b-a393-413d-913e-59d42748eb94",
            "match_id": "69939649-23f6-4e8f-9cf3-4329cbeea1fe",
            "score": 0,
            "is_winner": 0,
            "created_at": "2025-03-22 03:21:42",
            "updated_at": "2025-03-22 03:21:42"
          }
        },
        {
          "pair": {
            "id": "3f71b2f1-906c-4419-b464-666ec27ac98c",
            "is_eliminated": 0,
            "is_active": 1,
            "created_at": "2025-03-22 03:13:32",
            "updated_at": "2025-03-22 03:13:32",
            "registration_category": {
              "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
              "name": "open",
              "description": "Libre"
            },
            "players": [
              {
                "player": {
                  "id": "f93a0856-0289-435d-8e4d-e03f7e074c85",
                  "fullname": "Elena Morales",
                  "city": "Purísima del Rincón",
                  "weight": "64.00",
                  "height": "1.69",
                  "age": 23,
                  "experience": 5,
                  "is_active": 1,
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                },
                "relationship": {
                  "id": "6533cf0a-666f-4b56-bb1a-9929ea97691d",
                  "player_id": "f93a0856-0289-435d-8e4d-e03f7e074c85",
                  "pair_id": "3f71b2f1-906c-4419-b464-666ec27ac98c",
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                }
              },
              {
                "player": {
                  "id": "5fb2f36a-76c2-4ce0-8a01-75bc48bbaf35",
                  "fullname": "Diego Fernández",
                  "city": "Moroleón",
                  "weight": "77.00",
                  "height": "1.82",
                  "age": 27,
                  "experience": 8,
                  "is_active": 1,
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                },
                "relationship": {
                  "id": "792e4c9c-0a30-4a37-890e-03ea629dd49e",
                  "player_id": "5fb2f36a-76c2-4ce0-8a01-75bc48bbaf35",
                  "pair_id": "3f71b2f1-906c-4419-b464-666ec27ac98c",
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32"
                }
              }
            ]
          },
          "relationship": {
            "id": "5436ad10-b464-49cb-9b84-509f0a11123d",
            "pair_id": "3f71b2f1-906c-4419-b464-666ec27ac98c",
            "match_id": "69939649-23f6-4e8f-9cf3-4329cbeea1fe",
            "score": 0,
            "is_winner": 0,
            "created_at": "2025-03-22 03:21:42",
            "updated_at": "2025-03-22 03:21:42"
          }
        }
      ]
    },
    ...
  ],
  "status": 200,
  "pagination": {
    "page": 1,
    "limit": 24,
    "total": 3,
    "count": 54,
    "offset": 0
  },
  "description": "Information about the matches pairs and players with pagination"
}
```
