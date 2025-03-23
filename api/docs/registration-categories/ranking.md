# 🏆 + 👫 Ranking de las parejas y jugadores de una categoría de inscripción

```
[GET] /v1/categories/registrations/@id/ranking
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador de la categoría de inscripción. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/categories/registrations/@id/ranking
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
        "id": "87a33834-299a-4f51-a8be-ba9c540e0dfd",
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
              "id": "c2f0e46b-7d19-4598-954a-828b8f7f98b8",
              "fullname": "Alejandro Ruiz",
              "city": "Coroneo",
              "weight": "75.50",
              "height": "1.78",
              "age": 28,
              "experience": 11,
              "is_active": 1,
              "created_at": "2025-03-22 03:13:32",
              "updated_at": "2025-03-22 03:13:32"
            },
            "relationship": {
              "id": "6dee11bf-95ab-4777-894b-fc824918ed42",
              "player_id": "c2f0e46b-7d19-4598-954a-828b8f7f98b8",
              "pair_id": "87a33834-299a-4f51-a8be-ba9c540e0dfd",
              "created_at": "2025-03-22 03:13:32",
              "updated_at": "2025-03-22 03:13:32"
            }
          },
          {
            "player": {
              "id": "e8754436-9859-4ac3-b412-f142b11d810c",
              "fullname": "Verónica Solís",
              "city": "Cortazar",
              "weight": "62.00",
              "height": "1.67",
              "age": 25,
              "experience": 5,
              "is_active": 1,
              "created_at": "2025-03-22 03:13:32",
              "updated_at": "2025-03-22 03:13:32"
            },
            "relationship": {
              "id": "b05f7332-8045-4209-8de1-616f3125b2cf",
              "player_id": "e8754436-9859-4ac3-b412-f142b11d810c",
              "pair_id": "87a33834-299a-4f51-a8be-ba9c540e0dfd",
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
      "rating": {
        "total_winners": "0",
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
  "description": "Information about the registration category ranking"
}
```
