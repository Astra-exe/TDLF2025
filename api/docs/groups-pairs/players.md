# Parejas y jugadores de un grupo

```
[GET] /v1/groups/@id/pairs/players
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
  http://localhost:8080/v1/groups/@id/pairs/players
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "pair": {
        "id": "e1543be4-b9b0-415a-a9d7-cef3455b13c5",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-17 14:34:44",
        "updated_at": "2025-03-17 14:34:44",
        "registration_category": {
          "id": "c98fb1f7-837b-4301-947f-8367f6fb29b8",
          "name": "open",
          "description": "Libre"
        },
        "players": [
          {
            "player": {
              "id": "530a7061-2cf1-483d-8e06-7b5b87e3faf6",
              "fullname": "Lourdes Herrera",
              "city": "Apaseo el Alto",
              "weight": "62.50",
              "height": "1.67",
              "age": 25,
              "experience": 7,
              "is_active": 1,
              "created_at": "2025-03-17 14:34:44",
              "updated_at": "2025-03-17 14:34:44"
            },
            "relationship": {
              "id": "16d46f1e-1a39-4309-9fd3-632eb5c8c55d",
              "player_id": "530a7061-2cf1-483d-8e06-7b5b87e3faf6",
              "pair_id": "e1543be4-b9b0-415a-a9d7-cef3455b13c5",
              "created_at": "2025-03-17 14:34:44",
              "updated_at": "2025-03-17 14:34:44"
            }
          },
          {
            "player": {
              "id": "7da5a922-4964-49b8-9cc7-7290ad2f1495",
              "fullname": "Enrique Castro",
              "city": "Juventino Rosas",
              "weight": "75.00",
              "height": "1.79",
              "age": 28,
              "experience": 12,
              "is_active": 1,
              "created_at": "2025-03-17 14:34:44",
              "updated_at": "2025-03-17 14:34:44"
            },
            "relationship": {
              "id": "8f19088e-2629-4b2e-bf02-a7bcf4550f9b",
              "player_id": "7da5a922-4964-49b8-9cc7-7290ad2f1495",
              "pair_id": "e1543be4-b9b0-415a-a9d7-cef3455b13c5",
              "created_at": "2025-03-17 14:34:44",
              "updated_at": "2025-03-17 14:34:44"
            }
          }
        ]
      },
      "relationship": {
        "id": "2d57999d-111c-49a8-bdc8-215805e0b99e",
        "pair_id": "e1543be4-b9b0-415a-a9d7-cef3455b13c5",
        "group_id": "3a8b9ca2-09e6-47b8-8c8b-edbf506bd8fe",
        "created_at": "2025-03-17 16:07:14",
        "updated_at": "2025-03-17 16:07:14"
      }
    },
    {
      "pair": {
        "id": "87dbb871-fa5f-4698-bfad-d6ae6beb0e7a",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-17 14:34:44",
        "updated_at": "2025-03-17 14:34:44",
        "registration_category": {
          "id": "c98fb1f7-837b-4301-947f-8367f6fb29b8",
          "name": "open",
          "description": "Libre"
        },
        "players": [
          {
            "player": {
              "id": "dbe3d8f9-6985-4cac-a2ab-f442f60ab822",
              "fullname": "Karla Rivas",
              "city": "Victoria",
              "weight": "63.00",
              "height": "1.68",
              "age": 27,
              "experience": 7,
              "is_active": 1,
              "created_at": "2025-03-17 14:34:44",
              "updated_at": "2025-03-17 14:34:44"
            },
            "relationship": {
              "id": "1c3c812e-224e-45eb-9f90-9c3c0cc8fea1",
              "player_id": "dbe3d8f9-6985-4cac-a2ab-f442f60ab822",
              "pair_id": "87dbb871-fa5f-4698-bfad-d6ae6beb0e7a",
              "created_at": "2025-03-17 14:34:44",
              "updated_at": "2025-03-17 14:34:44"
            }
          },
          {
            "player": {
              "id": "f2f293f2-09c8-413e-9fbf-2bfe311b38e0",
              "fullname": "Ricardo Silva",
              "city": "Doctor Mora",
              "weight": "74.50",
              "height": "1.80",
              "age": 32,
              "experience": 12,
              "is_active": 1,
              "created_at": "2025-03-17 14:34:44",
              "updated_at": "2025-03-17 14:34:44"
            },
            "relationship": {
              "id": "97d4b22f-708d-4819-8fa1-2b7bfc2d7f1b",
              "player_id": "f2f293f2-09c8-413e-9fbf-2bfe311b38e0",
              "pair_id": "87dbb871-fa5f-4698-bfad-d6ae6beb0e7a",
              "created_at": "2025-03-17 14:34:44",
              "updated_at": "2025-03-17 14:34:44"
            }
          }
        ]
      },
      "relationship": {
        "id": "6f60337a-8b09-4878-be55-3ffec0412cef",
        "pair_id": "87dbb871-fa5f-4698-bfad-d6ae6beb0e7a",
        "group_id": "3a8b9ca2-09e6-47b8-8c8b-edbf506bd8fe",
        "created_at": "2025-03-17 16:07:14",
        "updated_at": "2025-03-17 16:07:14"
      }
    },
    ...
  ],
  "status": 200,
  "description": "Information about the players of the group pairs"
}
```
