# Parejas y jugadores de un partido

```
[GET] /v1/matches/@id/pairs/players
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del partido. |

Ejemplo:

 ```bash
 curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/matches/@id/pairs/players
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "pair": {
        "id": "46197c3b-aa33-4f59-b194-4f3ce08f83c5",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-18 14:40:07",
        "updated_at": "2025-03-18 14:40:07",
        "registration_category": {
          "id": "eb69a503-6eb3-4f20-b30b-c9a4762a8cfd",
          "name": "seniors",
          "description": "50 y más"
        },
        "players": [
          {
            "player": {
              "id": "5416802e-b3c6-480d-951f-9d9eb73daec6",
              "fullname": "Jorge Hernández",
              "city": "Celaya",
              "weight": "80.00",
              "height": "1.75",
              "age": 58,
              "experience": 28,
              "is_active": 1,
              "created_at": "2025-03-18 14:40:07",
              "updated_at": "2025-03-18 14:40:07"
            },
            "relationship": {
              "id": "0e889e98-50db-40a0-85ea-810e2919289c",
              "player_id": "5416802e-b3c6-480d-951f-9d9eb73daec6",
              "pair_id": "46197c3b-aa33-4f59-b194-4f3ce08f83c5",
              "created_at": "2025-03-18 14:40:07",
              "updated_at": "2025-03-18 14:40:07"
            }
          },
          {
            "player": {
              "id": "48bf2fee-eb86-4470-8989-d53629c70b4a",
              "fullname": "María Guzmán",
              "city": "Irapuato",
              "weight": "67.50",
              "height": "1.62",
              "age": 52,
              "experience": 22,
              "is_active": 1,
              "created_at": "2025-03-18 14:40:07",
              "updated_at": "2025-03-18 14:40:07"
            },
            "relationship": {
              "id": "4facf2f7-a2af-4935-ad35-be9d9db6d04a",
              "player_id": "48bf2fee-eb86-4470-8989-d53629c70b4a",
              "pair_id": "46197c3b-aa33-4f59-b194-4f3ce08f83c5",
              "created_at": "2025-03-18 14:40:07",
              "updated_at": "2025-03-18 14:40:07"
            }
          }
        ]
      },
      "relationship": {
        "id": "06928e67-a024-427c-ae4f-2dd940949aa3",
        "pair_id": "46197c3b-aa33-4f59-b194-4f3ce08f83c5",
        "match_id": "218574e0-759c-4d01-be9a-0e83d6dd2365",
        "score": 0,
        "is_winner": 0,
        "created_at": "2025-03-18 14:41:31",
        "updated_at": "2025-03-18 14:41:31"
      }
    },
    {
      "pair": {
        "id": "2a7b7e6d-23fc-4aa6-b6e1-1289afc97625",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-18 14:40:07",
        "updated_at": "2025-03-18 14:40:07",
        "registration_category": {
          "id": "eb69a503-6eb3-4f20-b30b-c9a4762a8cfd",
          "name": "seniors",
          "description": "50 y más"
        },
        "players": [
          {
            "player": {
              "id": "ca171e4e-d7be-4b15-9f91-bffc13130b3c",
              "fullname": "Patricia Navarro",
              "city": "Santa Cruz de Juventino Rosas",
              "weight": "66.50",
              "height": "1.64",
              "age": 57,
              "experience": 27,
              "is_active": 1,
              "created_at": "2025-03-18 14:40:07",
              "updated_at": "2025-03-18 14:40:07"
            },
            "relationship": {
              "id": "44c430fc-c51f-4076-a25c-a22a5431cb30",
              "player_id": "ca171e4e-d7be-4b15-9f91-bffc13130b3c",
              "pair_id": "2a7b7e6d-23fc-4aa6-b6e1-1289afc97625",
              "created_at": "2025-03-18 14:40:07",
              "updated_at": "2025-03-18 14:40:07"
            }
          },
          {
            "player": {
              "id": "a0a86ffb-c3cc-492e-9163-bdb6be3c2084",
              "fullname": "Héctor Márquez",
              "city": "Pueblo Nuevo",
              "weight": "79.20",
              "height": "1.75",
              "age": 61,
              "experience": 31,
              "is_active": 1,
              "created_at": "2025-03-18 14:40:07",
              "updated_at": "2025-03-18 14:40:07"
            },
            "relationship": {
              "id": "e7814a46-5b3f-48b4-9030-1f4b75af9244",
              "player_id": "a0a86ffb-c3cc-492e-9163-bdb6be3c2084",
              "pair_id": "2a7b7e6d-23fc-4aa6-b6e1-1289afc97625",
              "created_at": "2025-03-18 14:40:07",
              "updated_at": "2025-03-18 14:40:07"
            }
          }
        ]
      },
      "relationship": {
        "id": "0d620997-636a-477c-a666-42e20d36d249",
        "pair_id": "2a7b7e6d-23fc-4aa6-b6e1-1289afc97625",
        "match_id": "218574e0-759c-4d01-be9a-0e83d6dd2365",
        "score": 0,
        "is_winner": 0,
        "created_at": "2025-03-18 14:41:31",
        "updated_at": "2025-03-18 14:41:31"
      }
    }
  ],
  "status": 200,
  "description": "Information about the players of the match pairs"
}
```
