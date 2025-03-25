# 👥 + 🎾 + 👫 + 🏃‍♂️ Grupos, partidos, parejas y jugadores

Partidos, parejas y jugadores asignados a los grupos.

```
[GET] /v1/groups/matches/pairs/players
```

Parámetros de consulta:

| Parámetro | Tipo | Rango | Por defecto | Descripción |
| --------- | ---- | ----- | ----------- | ----------- |
| `page` | `integer` | `min_numeric: 1` | `1` | Número de la página de resultados de los grupos con sus partidos, parejas y jugadores. |
| `filterBy` | `string` | `contains: [name, description]` | `name` | Campo de búsqueda de los grupos con sus partidos, parejas y jugadores. |
| `orderBy` | `string` | `contains: [name, description, created_at, updated_at]` | `name` | Campo de ordenamiento de los grupos con sus partidos, parejas y jugadores. |
| `sortBy` | `string` | `contains: [asc, desc]` | `asc` | Modo de ordenamiento de los grupos con sus partidos, parejas y jugadores. |
| `registration_category_id` | `string` | `exact_len: 36` | `null` | Identificador de la categoría de inscripción de los grupos con sus partidos, parejas y jugadores ([ver](../registration-categories/index.html)). |
| `is_eliminated` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar los grupos con sus partidos, parejas y jugadores por estatus de eliminación. |
| `is_active` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar los grupos con sus partidos, parejas y jugadores por estatus de actividad. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/groups/matches/pairs/players?page=2&filterBy=name&orderBy=name&sortBy=asc&registration_category_id=21c13c24-af5d-45bd-9294-2de7e175ceee&is_eliminated=false&is_active=true
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "group": {
        "id": "010e017e-3bd3-4db0-99e4-ad3618b669a5",
        "name": "A_2025",
        "description": "A",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-22 03:21:43",
        "updated_at": "2025-03-22 03:21:43",
        "registration_category": {
          "id": "21c13c24-af5d-45bd-9294-2de7e175ceee",
          "name": "seniors",
          "description": "50 y más"
        }
      },
      "matches": [
        {
          "match": {
            "id": "01cf60b7-de92-45b5-8051-383416d94238",
            "is_active": 1,
            "created_at": "2025-03-22 03:21:43",
            "updated_at": "2025-03-22 03:21:43",
            "registration_category": {
              "id": "21c13c24-af5d-45bd-9294-2de7e175ceee",
              "name": "seniors",
              "description": "50 y más"
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
                  "id": "78e0192e-3ad5-4c8f-9064-783c6090008b",
                  "is_eliminated": 0,
                  "is_active": 1,
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32",
                  "registration_category": {
                    "id": "21c13c24-af5d-45bd-9294-2de7e175ceee",
                    "name": "seniors",
                    "description": "50 y más"
                  },
                  "players": [
                    {
                      "player": {
                        "id": "5e6c10cf-0b74-465a-9843-3427c7be9fd9",
                        "fullname": "Fernando Gómez",
                        "city": "Apaseo el Grande",
                        "weight": "78.20",
                        "height": "1.71",
                        "age": 53,
                        "experience": 23,
                        "is_active": 1,
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      },
                      "relationship": {
                        "id": "6a4284e5-aa1f-4784-81e5-71569c854180",
                        "player_id": "5e6c10cf-0b74-465a-9843-3427c7be9fd9",
                        "pair_id": "78e0192e-3ad5-4c8f-9064-783c6090008b",
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      }
                    },
                    {
                      "player": {
                        "id": "693862e4-bd66-46c0-9305-6f96d517725e",
                        "fullname": "Gabriela Jiménez",
                        "city": "Uriangato",
                        "weight": "65.50",
                        "height": "1.62",
                        "age": 61,
                        "experience": 31,
                        "is_active": 1,
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      },
                      "relationship": {
                        "id": "b644d27b-a73e-42d5-b193-d31fc6712b4a",
                        "player_id": "693862e4-bd66-46c0-9305-6f96d517725e",
                        "pair_id": "78e0192e-3ad5-4c8f-9064-783c6090008b",
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      }
                    }
                  ]
                },
                "relationship": {
                  "id": "9ec5cb5c-3aab-4ca4-aa33-f896d240e533",
                  "pair_id": "78e0192e-3ad5-4c8f-9064-783c6090008b",
                  "match_id": "01cf60b7-de92-45b5-8051-383416d94238",
                  "score": 0,
                  "is_winner": 0,
                  "created_at": "2025-03-22 03:21:43",
                  "updated_at": "2025-03-22 03:21:43"
                }
              },
              {
                "pair": {
                  "id": "d2955c5e-3548-48cc-9f2d-02586d8384d7",
                  "is_eliminated": 0,
                  "is_active": 1,
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32",
                  "registration_category": {
                    "id": "21c13c24-af5d-45bd-9294-2de7e175ceee",
                    "name": "seniors",
                    "description": "50 y más"
                  },
                  "players": [
                    {
                      "player": {
                        "id": "08d34019-e287-4463-9a35-2303f4562b01",
                        "fullname": "Laura Vargas",
                        "city": "Dolores Hidalgo",
                        "weight": "64.50",
                        "height": "1.63",
                        "age": 59,
                        "experience": 29,
                        "is_active": 1,
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      },
                      "relationship": {
                        "id": "9a751a07-5759-4dd4-87fe-3d1c06f991b4",
                        "player_id": "08d34019-e287-4463-9a35-2303f4562b01",
                        "pair_id": "d2955c5e-3548-48cc-9f2d-02586d8384d7",
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      }
                    },
                    {
                      "player": {
                        "id": "bdcfe411-5f65-4f00-80bf-280c9a0238b7",
                        "fullname": "Carlos Sánchez",
                        "city": "Silao",
                        "weight": "77.50",
                        "height": "1.74",
                        "age": 54,
                        "experience": 24,
                        "is_active": 1,
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      },
                      "relationship": {
                        "id": "a43769c6-fa7f-4e33-b278-26f03bcd5dcb",
                        "player_id": "bdcfe411-5f65-4f00-80bf-280c9a0238b7",
                        "pair_id": "d2955c5e-3548-48cc-9f2d-02586d8384d7",
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      }
                    }
                  ]
                },
                "relationship": {
                  "id": "e70bfd47-3d3f-4e91-9e32-6504dbd54b8b",
                  "pair_id": "d2955c5e-3548-48cc-9f2d-02586d8384d7",
                  "match_id": "01cf60b7-de92-45b5-8051-383416d94238",
                  "score": 0,
                  "is_winner": 0,
                  "created_at": "2025-03-22 03:21:43",
                  "updated_at": "2025-03-22 03:21:43"
                }
              }
            ]
          },
          "relationship": {
            "id": "9bfd7fad-f5a8-4a43-8b45-715431b89053",
            "group_id": "010e017e-3bd3-4db0-99e4-ad3618b669a5",
            "match_id": "01cf60b7-de92-45b5-8051-383416d94238",
            "created_at": "2025-03-22 03:21:43",
            "updated_at": "2025-03-22 03:21:43"
          }
        },
        {
          "match": {
            "id": "17d17886-c1a2-42c4-a75c-d9bff8f5169d",
            "is_active": 1,
            "created_at": "2025-03-22 03:21:43",
            "updated_at": "2025-03-22 03:21:43",
            "registration_category": {
              "id": "21c13c24-af5d-45bd-9294-2de7e175ceee",
              "name": "seniors",
              "description": "50 y más"
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
                  "id": "6cc0b3a3-e263-4070-9e93-5b02bb443102",
                  "is_eliminated": 0,
                  "is_active": 1,
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32",
                  "registration_category": {
                    "id": "21c13c24-af5d-45bd-9294-2de7e175ceee",
                    "name": "seniors",
                    "description": "50 y más"
                  },
                  "players": [
                    {
                      "player": {
                        "id": "f12ee012-264a-4fa6-b880-ebc3527a3a9b",
                        "fullname": "Roberto Torres",
                        "city": "Salamanca",
                        "weight": "79.00",
                        "height": "1.73",
                        "age": 65,
                        "experience": 35,
                        "is_active": 1,
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      },
                      "relationship": {
                        "id": "3521e54d-29d2-41c7-a736-57a3cec7b893",
                        "player_id": "f12ee012-264a-4fa6-b880-ebc3527a3a9b",
                        "pair_id": "6cc0b3a3-e263-4070-9e93-5b02bb443102",
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      }
                    },
                    {
                      "player": {
                        "id": "6414805e-82bb-46a3-8223-f76e7a0b8833",
                        "fullname": "Sofía Mendoza",
                        "city": "San Miguel de Allende",
                        "weight": "66.00",
                        "height": "1.61",
                        "age": 57,
                        "experience": 27,
                        "is_active": 1,
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      },
                      "relationship": {
                        "id": "9e9ee62b-2dcf-42cd-a66b-8d8332d4a808",
                        "player_id": "6414805e-82bb-46a3-8223-f76e7a0b8833",
                        "pair_id": "6cc0b3a3-e263-4070-9e93-5b02bb443102",
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      }
                    }
                  ]
                },
                "relationship": {
                  "id": "34d51812-538e-4a91-aa93-6420f221b192",
                  "pair_id": "6cc0b3a3-e263-4070-9e93-5b02bb443102",
                  "match_id": "17d17886-c1a2-42c4-a75c-d9bff8f5169d",
                  "score": 0,
                  "is_winner": 0,
                  "created_at": "2025-03-22 03:21:43",
                  "updated_at": "2025-03-22 03:21:43"
                }
              },
              {
                "pair": {
                  "id": "d2955c5e-3548-48cc-9f2d-02586d8384d7",
                  "is_eliminated": 0,
                  "is_active": 1,
                  "created_at": "2025-03-22 03:13:32",
                  "updated_at": "2025-03-22 03:13:32",
                  "registration_category": {
                    "id": "21c13c24-af5d-45bd-9294-2de7e175ceee",
                    "name": "seniors",
                    "description": "50 y más"
                  },
                  "players": [
                    {
                      "player": {
                        "id": "08d34019-e287-4463-9a35-2303f4562b01",
                        "fullname": "Laura Vargas",
                        "city": "Dolores Hidalgo",
                        "weight": "64.50",
                        "height": "1.63",
                        "age": 59,
                        "experience": 29,
                        "is_active": 1,
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      },
                      "relationship": {
                        "id": "9a751a07-5759-4dd4-87fe-3d1c06f991b4",
                        "player_id": "08d34019-e287-4463-9a35-2303f4562b01",
                        "pair_id": "d2955c5e-3548-48cc-9f2d-02586d8384d7",
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      }
                    },
                    {
                      "player": {
                        "id": "bdcfe411-5f65-4f00-80bf-280c9a0238b7",
                        "fullname": "Carlos Sánchez",
                        "city": "Silao",
                        "weight": "77.50",
                        "height": "1.74",
                        "age": 54,
                        "experience": 24,
                        "is_active": 1,
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      },
                      "relationship": {
                        "id": "a43769c6-fa7f-4e33-b278-26f03bcd5dcb",
                        "player_id": "bdcfe411-5f65-4f00-80bf-280c9a0238b7",
                        "pair_id": "d2955c5e-3548-48cc-9f2d-02586d8384d7",
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      }
                    }
                  ]
                },
                "relationship": {
                  "id": "bbef0bf7-2e46-475f-a0b8-c0ef4c25e667",
                  "pair_id": "d2955c5e-3548-48cc-9f2d-02586d8384d7",
                  "match_id": "17d17886-c1a2-42c4-a75c-d9bff8f5169d",
                  "score": 0,
                  "is_winner": 0,
                  "created_at": "2025-03-22 03:21:43",
                  "updated_at": "2025-03-22 03:21:43"
                }
              }
            ]
          },
          "relationship": {
            "id": "0b385a53-5a09-47df-b436-e239bd1039ac",
            "group_id": "010e017e-3bd3-4db0-99e4-ad3618b669a5",
            "match_id": "17d17886-c1a2-42c4-a75c-d9bff8f5169d",
            "created_at": "2025-03-22 03:21:43",
            "updated_at": "2025-03-22 03:21:43"
          }
        },
        ...
      ]
    },
    {
      "group": {
        "id": "77669f69-4a91-4488-8837-b8a4924ec7a2",
        "name": "A_2025",
        "description": "A",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-22 03:21:42",
        "updated_at": "2025-03-22 03:21:42",
        "registration_category": {
          "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
          "name": "open",
          "description": "Libre"
        }
      },
      "matches": [
        {
          "match": {
            "id": "3e690b4d-ea5b-439b-bf36-0dc501c36f01",
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
            },
            "pairs": [
              {
                "pair": {
                  "id": "8a9a64b2-6311-400d-961d-1cb2e8c5bad6",
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
                        "id": "1d8c0b70-bbb7-4299-bb5f-d81df7df3385",
                        "fullname": "Valeria Castro",
                        "city": "Acámbaro",
                        "weight": "61.80",
                        "height": "1.66",
                        "age": 22,
                        "experience": 4,
                        "is_active": 1,
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      },
                      "relationship": {
                        "id": "3ebec049-639d-41f4-88b6-1cf3e3ab6116",
                        "player_id": "1d8c0b70-bbb7-4299-bb5f-d81df7df3385",
                        "pair_id": "8a9a64b2-6311-400d-961d-1cb2e8c5bad6",
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      }
                    },
                    {
                      "player": {
                        "id": "666d62b2-48f4-44f9-acc8-3d76cac46894",
                        "fullname": "José Ramírez",
                        "city": "Yuriria",
                        "weight": "74.00",
                        "height": "1.79",
                        "age": 31,
                        "experience": 14,
                        "is_active": 1,
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      },
                      "relationship": {
                        "id": "da155962-bc14-4ab0-99d0-2a5041fb6375",
                        "player_id": "666d62b2-48f4-44f9-acc8-3d76cac46894",
                        "pair_id": "8a9a64b2-6311-400d-961d-1cb2e8c5bad6",
                        "created_at": "2025-03-22 03:13:32",
                        "updated_at": "2025-03-22 03:13:32"
                      }
                    }
                  ]
                },
                "relationship": {
                  "id": "3588b06f-60d4-477b-b808-3f3e7ce59c66",
                  "pair_id": "8a9a64b2-6311-400d-961d-1cb2e8c5bad6",
                  "match_id": "3e690b4d-ea5b-439b-bf36-0dc501c36f01",
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
                  "id": "efc04a38-1645-4a5c-a813-4bd3aadf3efe",
                  "pair_id": "57f1a4fc-e84b-44e1-81ea-9a960cb076f2",
                  "match_id": "3e690b4d-ea5b-439b-bf36-0dc501c36f01",
                  "score": 0,
                  "is_winner": 0,
                  "created_at": "2025-03-22 03:21:42",
                  "updated_at": "2025-03-22 03:21:42"
                }
              }
            ]
          },
          "relationship": {
            "id": "8111d768-4a63-4b99-aafa-e5b433c920b6",
            "group_id": "77669f69-4a91-4488-8837-b8a4924ec7a2",
            "match_id": "3e690b4d-ea5b-439b-bf36-0dc501c36f01",
            "created_at": "2025-03-22 03:21:42",
            "updated_at": "2025-03-22 03:21:42"
          }
        },
        {
          "match": {
            "id": "4b834126-9be8-46d9-b826-b4b49cc95041",
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
                  "id": "2b396588-6605-4f91-ba6b-23b62d75c103",
                  "pair_id": "e4c8b51b-a393-413d-913e-59d42748eb94",
                  "match_id": "4b834126-9be8-46d9-b826-b4b49cc95041",
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
                  "id": "3668241f-973b-4c40-a46a-b3bf08d72d51",
                  "pair_id": "57f1a4fc-e84b-44e1-81ea-9a960cb076f2",
                  "match_id": "4b834126-9be8-46d9-b826-b4b49cc95041",
                  "score": 0,
                  "is_winner": 0,
                  "created_at": "2025-03-22 03:21:42",
                  "updated_at": "2025-03-22 03:21:42"
                }
              }
            ]
          },
          "relationship": {
            "id": "fc4f832d-97fb-4f51-b283-6513ae6ad182",
            "group_id": "77669f69-4a91-4488-8837-b8a4924ec7a2",
            "match_id": "4b834126-9be8-46d9-b826-b4b49cc95041",
            "created_at": "2025-03-22 03:21:42",
            "updated_at": "2025-03-22 03:21:42"
          }
        },
        ...
      ]
    },
    ...
  ],
  "status": 200,
  "pagination": {
    "page": 1,
    "limit": 4,
    "total": 3,
    "count": 9,
    "offset": 0
  },
  "description": "Information about all the groups matches and pairs players with pagination"
}
```
