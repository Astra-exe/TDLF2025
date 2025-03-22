# ➕ Crear un partido

```
[POST] /v1/matches
```

Cuerpo de la petición:

| Propiedades | Tipo | Requerido | Rango | Descripción |
| ----------- | ---- | --------- | ----- | ----------- |
| `registration_category_id` | `string` | `true` | `exact_len: 36` | Identificador de la categoría de inscripción del partido ([ver](../registration-categories/index.html)). |
| `match_category_id` | `string` | `true` | `exact_len: 36` | Identificador de la categoría de la ronda del partido ([ver](../match-categories/index.html)). |
| `match_status_id` | `string` | `true` | `exact_len: 36` | Identificador del estatus de juego del partido ([ver](../match-status/index.html)). |
| `pairs` | `array[pairs]` | `true` | `array_size_equal: 2` | Una lista con los identificadores de las parejas del partido ([ver](../pairs/index.html)). |

Ejemplo:

```bash
curl -X POST \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/matches \
  -d '{
    "registration_category_id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
    "match_category_id": "a6e9127a-3f9a-47e6-8564-383267ffd61b",
    "match_status_id": "5a0db153-17c1-47f4-857f-7bf946f11eaa",
    "pairs": [
      "1d860c33-5d9d-4cbc-a7ce-a04f9be1a295",
      "f6521429-112c-44b7-a70f-ba79a207aaaa"
    ]
  }'
```

Respuesta de la petición:

```json
{
  "data": {
    "match": {
      "id": "af5f3bf4-02ae-43cb-ac62-ab9fe416c78c",
      "is_active": 1,
      "created_at": "2025-03-22 00:40:15",
      "updated_at": "2025-03-22 00:40:15",
      "registration_category": {
        "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
        "name": "open",
        "description": "Libre"
      },
      "match_category": {
        "id": "a6e9127a-3f9a-47e6-8564-383267ffd61b",
        "name": "final",
        "description": "Final"
      },
      "match_status": {
        "id": "5a0db153-17c1-47f4-857f-7bf946f11eaa",
        "name": "playing",
        "description": "En juego"
      }
    },
    "pairs": [
      {
        "pair": {
          "id": "1d860c33-5d9d-4cbc-a7ce-a04f9be1a295",
          "is_eliminated": 0,
          "is_active": 1,
          "created_at": "2025-03-20 21:23:55",
          "updated_at": "2025-03-20 21:23:55",
          "registration_category": {
            "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
            "name": "open",
            "description": "Libre"
          }
        },
        "relationship": {
          "id": "a8683b32-f9cc-4814-acbf-df7c97b3d8f9",
          "pair_id": "1d860c33-5d9d-4cbc-a7ce-a04f9be1a295",
          "match_id": "af5f3bf4-02ae-43cb-ac62-ab9fe416c78c",
          "score": 0,
          "is_winner": 0,
          "created_at": "2025-03-22 00:40:15",
          "updated_at": "2025-03-22 00:40:15"
        }
      },
      {
        "pair": {
          "id": "f6521429-112c-44b7-a70f-ba79a207aaaa",
          "is_eliminated": 0,
          "is_active": 1,
          "created_at": "2025-03-20 21:23:55",
          "updated_at": "2025-03-20 21:23:55",
          "registration_category": {
            "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
            "name": "open",
            "description": "Libre"
          }
        },
        "relationship": {
          "id": "c59b7cff-edbb-42f8-87b8-f64bdbe52fc7",
          "pair_id": "f6521429-112c-44b7-a70f-ba79a207aaaa",
          "match_id": "af5f3bf4-02ae-43cb-ac62-ab9fe416c78c",
          "score": 0,
          "is_winner": 0,
          "created_at": "2025-03-22 00:40:15",
          "updated_at": "2025-03-22 00:40:15"
        }
      }
    ]
  },
  "status": 201,
  "description": "The match was created successfully"
}
```
