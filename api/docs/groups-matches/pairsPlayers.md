# Partidos, parejas y jugadores de un grupo

```
[GET] /v1/groups/@id/matches/pairs/players
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
  http://localhost:8080/v1/groups/@id/matches/pairs/players
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "match": {
        "id": "0f5fed47-79d3-4428-bb3e-a3e69d196bdf",
        "is_active": 1,
        "created_at": "2025-03-20 21:27:39",
        "updated_at": "2025-03-20 21:27:39",
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
        },
        "pairs": [
          {
            "pair": {
              "id": "94b132c7-7de0-48c0-8990-67c08fc677b7",
              "is_eliminated": 0,
              "is_active": 1,
              "created_at": "2025-03-20 21:23:55",
              "updated_at": "2025-03-20 21:23:55",
              "registration_category": {
                "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
                "name": "open",
                "description": "Libre"
              },
              "players": [
                {
                  "player": {
                    "id": "db520e4c-f133-4c2f-8a95-d4ae12115dcf",
                    "fullname": "Enrique Castro",
                    "city": "Juventino Rosas",
                    "weight": "75.00",
                    "height": "1.79",
                    "age": 28,
                    "experience": 12,
                    "is_active": 1,
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  },
                  "relationship": {
                    "id": "d704a086-5b83-4a5d-af30-c3e078bd9994",
                    "player_id": "db520e4c-f133-4c2f-8a95-d4ae12115dcf",
                    "pair_id": "94b132c7-7de0-48c0-8990-67c08fc677b7",
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  }
                },
                {
                  "player": {
                    "id": "4fafb80d-7603-483d-ae88-adc6a3c22030",
                    "fullname": "Lourdes Herrera",
                    "city": "Apaseo el Alto",
                    "weight": "62.50",
                    "height": "1.67",
                    "age": 25,
                    "experience": 7,
                    "is_active": 1,
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  },
                  "relationship": {
                    "id": "e39cb145-dc87-43fc-8658-a9897a823c12",
                    "player_id": "4fafb80d-7603-483d-ae88-adc6a3c22030",
                    "pair_id": "94b132c7-7de0-48c0-8990-67c08fc677b7",
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  }
                }
              ]
            },
            "relationship": {
              "id": "8eb56e51-e000-41ec-961e-0311189decc8",
              "pair_id": "94b132c7-7de0-48c0-8990-67c08fc677b7",
              "match_id": "0f5fed47-79d3-4428-bb3e-a3e69d196bdf",
              "score": 0,
              "is_winner": 0,
              "created_at": "2025-03-20 21:27:39",
              "updated_at": "2025-03-20 21:27:39"
            }
          },
          {
            "pair": {
              "id": "5de44dbe-9953-448f-a9bb-064f737b4111",
              "is_eliminated": 0,
              "is_active": 1,
              "created_at": "2025-03-20 21:23:55",
              "updated_at": "2025-03-20 21:23:55",
              "registration_category": {
                "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
                "name": "open",
                "description": "Libre"
              },
              "players": [
                {
                  "player": {
                    "id": "fb093289-8c9b-4ed2-9e71-ef1b4c0cb67b",
                    "fullname": "Roberto Díaz",
                    "city": "Jerécuaro",
                    "weight": "78.00",
                    "height": "1.83",
                    "age": 34,
                    "experience": 13,
                    "is_active": 1,
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  },
                  "relationship": {
                    "id": "14b2533e-f5e7-4792-b858-e62a359c8511",
                    "player_id": "fb093289-8c9b-4ed2-9e71-ef1b4c0cb67b",
                    "pair_id": "5de44dbe-9953-448f-a9bb-064f737b4111",
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  }
                },
                {
                  "player": {
                    "id": "851b6bed-765c-4675-b77d-513fd64e3fc9",
                    "fullname": "Claudia Mendoza",
                    "city": "Tarimoro",
                    "weight": "64.50",
                    "height": "1.70",
                    "age": 27,
                    "experience": 8,
                    "is_active": 1,
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  },
                  "relationship": {
                    "id": "8fb7d4f4-74cb-4911-821a-1f6bcd5154d1",
                    "player_id": "851b6bed-765c-4675-b77d-513fd64e3fc9",
                    "pair_id": "5de44dbe-9953-448f-a9bb-064f737b4111",
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  }
                }
              ]
            },
            "relationship": {
              "id": "a93ccf7e-dbfd-4541-830b-3e607fd94dd4",
              "pair_id": "5de44dbe-9953-448f-a9bb-064f737b4111",
              "match_id": "0f5fed47-79d3-4428-bb3e-a3e69d196bdf",
              "score": 0,
              "is_winner": 0,
              "created_at": "2025-03-20 21:27:39",
              "updated_at": "2025-03-20 21:27:39"
            }
          }
        ]
      },
      "relationship": {
        "id": "8779d8d2-dcab-42f7-a886-2f855224b72c",
        "group_id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
        "match_id": "0f5fed47-79d3-4428-bb3e-a3e69d196bdf",
        "created_at": "2025-03-20 21:27:39",
        "updated_at": "2025-03-20 21:27:39"
      }
    },
    {
      "match": {
        "id": "5ef5e266-002f-4934-a11a-3fcb18d53394",
        "is_active": 1,
        "created_at": "2025-03-20 21:27:39",
        "updated_at": "2025-03-20 21:27:39",
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
        },
        "pairs": [
          {
            "pair": {
              "id": "bc436a6a-57b8-43a2-b407-b4110a11dfe9",
              "is_eliminated": 0,
              "is_active": 1,
              "created_at": "2025-03-20 21:23:55",
              "updated_at": "2025-03-20 21:23:55",
              "registration_category": {
                "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
                "name": "open",
                "description": "Libre"
              },
              "players": [
                {
                  "player": {
                    "id": "81c3cb2e-8e8b-451f-bea0-6e80ebb8fc71",
                    "fullname": "Karla Rivas",
                    "city": "Victoria",
                    "weight": "63.00",
                    "height": "1.68",
                    "age": 27,
                    "experience": 7,
                    "is_active": 1,
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  },
                  "relationship": {
                    "id": "6411fcdc-3bda-48b0-a8eb-b8f67bf999ba",
                    "player_id": "81c3cb2e-8e8b-451f-bea0-6e80ebb8fc71",
                    "pair_id": "bc436a6a-57b8-43a2-b407-b4110a11dfe9",
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  }
                },
                {
                  "player": {
                    "id": "fcc16996-934e-4e19-a167-af92457859ae",
                    "fullname": "Ricardo Silva",
                    "city": "Doctor Mora",
                    "weight": "74.50",
                    "height": "1.80",
                    "age": 32,
                    "experience": 12,
                    "is_active": 1,
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  },
                  "relationship": {
                    "id": "e138e8aa-751e-48c2-baa3-04acc2357be3",
                    "player_id": "fcc16996-934e-4e19-a167-af92457859ae",
                    "pair_id": "bc436a6a-57b8-43a2-b407-b4110a11dfe9",
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  }
                }
              ]
            },
            "relationship": {
              "id": "92d1b565-7c42-4961-92c0-b116281c4ea4",
              "pair_id": "bc436a6a-57b8-43a2-b407-b4110a11dfe9",
              "match_id": "5ef5e266-002f-4934-a11a-3fcb18d53394",
              "score": 0,
              "is_winner": 0,
              "created_at": "2025-03-20 21:27:39",
              "updated_at": "2025-03-20 21:27:39"
            }
          },
          {
            "pair": {
              "id": "94b132c7-7de0-48c0-8990-67c08fc677b7",
              "is_eliminated": 0,
              "is_active": 1,
              "created_at": "2025-03-20 21:23:55",
              "updated_at": "2025-03-20 21:23:55",
              "registration_category": {
                "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
                "name": "open",
                "description": "Libre"
              },
              "players": [
                {
                  "player": {
                    "id": "db520e4c-f133-4c2f-8a95-d4ae12115dcf",
                    "fullname": "Enrique Castro",
                    "city": "Juventino Rosas",
                    "weight": "75.00",
                    "height": "1.79",
                    "age": 28,
                    "experience": 12,
                    "is_active": 1,
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  },
                  "relationship": {
                    "id": "d704a086-5b83-4a5d-af30-c3e078bd9994",
                    "player_id": "db520e4c-f133-4c2f-8a95-d4ae12115dcf",
                    "pair_id": "94b132c7-7de0-48c0-8990-67c08fc677b7",
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  }
                },
                {
                  "player": {
                    "id": "4fafb80d-7603-483d-ae88-adc6a3c22030",
                    "fullname": "Lourdes Herrera",
                    "city": "Apaseo el Alto",
                    "weight": "62.50",
                    "height": "1.67",
                    "age": 25,
                    "experience": 7,
                    "is_active": 1,
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  },
                  "relationship": {
                    "id": "e39cb145-dc87-43fc-8658-a9897a823c12",
                    "player_id": "4fafb80d-7603-483d-ae88-adc6a3c22030",
                    "pair_id": "94b132c7-7de0-48c0-8990-67c08fc677b7",
                    "created_at": "2025-03-20 21:23:55",
                    "updated_at": "2025-03-20 21:23:55"
                  }
                }
              ]
            },
            "relationship": {
              "id": "bc6137bf-8342-40b2-8a95-29b8ae6f89c0",
              "pair_id": "94b132c7-7de0-48c0-8990-67c08fc677b7",
              "match_id": "5ef5e266-002f-4934-a11a-3fcb18d53394",
              "score": 0,
              "is_winner": 0,
              "created_at": "2025-03-20 21:27:39",
              "updated_at": "2025-03-20 21:27:39"
            }
          }
        ]
      },
      "relationship": {
        "id": "4e68dbaa-759e-47f0-a300-6b0630fe4d26",
        "group_id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
        "match_id": "5ef5e266-002f-4934-a11a-3fcb18d53394",
        "created_at": "2025-03-20 21:27:39",
        "updated_at": "2025-03-20 21:27:39"
      }
    },
    ...
  ],
  "status": 200,
  "description": "Information about the group matches with pairs players"
}
```
