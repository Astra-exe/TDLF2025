# 🏆 + 👫 Ranking de las parejas y jugadores de un grupo

```
[GET] /v1/groups/@id/ranking
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del grupo. |

Ejemplo:

```bash
 curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/groups/@id/ranking
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "pair": {
        "id": "2b54a574-3153-47a4-b2ae-d8353b68b2d6",
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
              "id": "e8522e06-23ba-43d7-bab7-c5c1c7528c13",
              "fullname": "Laura Vargas",
              "city": "Dolores Hidalgo",
              "weight": "60.50",
              "height": "1.67",
              "age": 25,
              "experience": 6,
              "is_active": 1,
              "created_at": "2025-03-22 03:13:32",
              "updated_at": "2025-03-22 03:13:32"
            },
            "relationship": {
              "id": "2d29f683-17f0-4edc-8694-39e9f178f40f",
              "player_id": "e8522e06-23ba-43d7-bab7-c5c1c7528c13",
              "pair_id": "2b54a574-3153-47a4-b2ae-d8353b68b2d6",
              "created_at": "2025-03-22 03:13:32",
              "updated_at": "2025-03-22 03:13:32"
            }
          },
          {
            "player": {
              "id": "ddd7453f-cf22-4de3-af38-ba799bceda59",
              "fullname": "Pedro Gómez",
              "city": "Silao",
              "weight": "72.50",
              "height": "1.76",
              "age": 30,
              "experience": 11,
              "is_active": 1,
              "created_at": "2025-03-22 03:13:32",
              "updated_at": "2025-03-22 03:13:32"
            },
            "relationship": {
              "id": "9f951225-35c9-48c3-9169-80486ddb7b7f",
              "player_id": "ddd7453f-cf22-4de3-af38-ba799bceda59",
              "pair_id": "2b54a574-3153-47a4-b2ae-d8353b68b2d6",
              "created_at": "2025-03-22 03:13:32",
              "updated_at": "2025-03-22 03:13:32"
            }
          }
        ]
      },
      "rating": {
        "total_winners": "1",
        "total_score": "2"
      }
    },
    {
      "pair": {
        "id": "79a230ca-16d0-47ef-8362-c6f30b95f44e",
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
              "id": "1dd257d2-52fd-4245-a7dd-e46f1d0db923",
              "fullname": "Enrique Castro",
              "city": "Juventino Rosas",
              "weight": "75.00",
              "height": "1.79",
              "age": 28,
              "experience": 12,
              "is_active": 1,
              "created_at": "2025-03-22 03:13:32",
              "updated_at": "2025-03-22 03:13:32"
            },
            "relationship": {
              "id": "00f2d827-8ae0-4b26-92d4-9479aa6897a3",
              "player_id": "1dd257d2-52fd-4245-a7dd-e46f1d0db923",
              "pair_id": "79a230ca-16d0-47ef-8362-c6f30b95f44e",
              "created_at": "2025-03-22 03:13:32",
              "updated_at": "2025-03-22 03:13:32"
            }
          },
          {
            "player": {
              "id": "b75e53e4-d965-4274-b640-10e0f9fc1913",
              "fullname": "Lourdes Herrera",
              "city": "Apaseo el Alto",
              "weight": "62.50",
              "height": "1.67",
              "age": 25,
              "experience": 7,
              "is_active": 1,
              "created_at": "2025-03-22 03:13:32",
              "updated_at": "2025-03-22 03:13:32"
            },
            "relationship": {
              "id": "56d6f1a6-d72d-410c-b27a-6af38391757c",
              "player_id": "b75e53e4-d965-4274-b640-10e0f9fc1913",
              "pair_id": "79a230ca-16d0-47ef-8362-c6f30b95f44e",
              "created_at": "2025-03-22 03:13:32",
              "updated_at": "2025-03-22 03:13:32"
            }
          }
        ]
      },
      "rating": {
        "total_winners": "0",
        "total_score": "1"
      }
    },
    ...
  ],
  "status": 200,
  "description": "Information about the group ranking"
}
```
