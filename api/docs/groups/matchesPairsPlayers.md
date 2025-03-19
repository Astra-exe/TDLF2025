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
        "id": "0858b8ee-0ccb-4764-94a7-1deb9d956c23",
        "group_id": "19dcf711-ac20-4be5-8bc9-daa27582c6c2",
        "is_active": 1,
        "created_at": "2025-03-18 01:21:28",
        "updated_at": "2025-03-18 01:21:28",
        "registration_category": {
          "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
          "name": "open",
          "description": "Libre"
        },
        "match_category": {
          "id": "75173798-35ea-4415-8ac4-89a8a2918600",
          "name": "qualifier",
          "description": "Clasificación"
        },
        "match_status": {
          "id": "02ee09c2-34bc-4f27-84ff-6ceca7c50882",
          "name": "scheduled",
          "description": "Programado"
        },
        "pairs": [
          {
            "pair": {
              "id": "4aeacf96-38c9-4400-859c-461ae9a6024d",
              "is_eliminated": 0,
              "is_active": 1,
              "created_at": "2025-03-17 23:51:48",
              "updated_at": "2025-03-17 23:51:48",
              "registration_category": {
                "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
                "name": "open",
                "description": "Libre"
              },
              "players": [
                {
                  "player": {
                    "id": "39e1f248-7c69-40ce-9406-0b226c7207a5",
                    "fullname": "Jorge Medina",
                    "city": "Pueblo Nuevo",
                    "weight": "76.50",
                    "height": "1.82",
                    "age": 32,
                    "experience": 13,
                    "is_active": 1,
                    "created_at": "2025-03-17 23:51:48",
                    "updated_at": "2025-03-17 23:51:48"
                  },
                  "relationship": {
                    "id": "61197d8f-0a14-4d3b-8ab4-fb3ed23db98a",
                    "player_id": "39e1f248-7c69-40ce-9406-0b226c7207a5",
                    "pair_id": "4aeacf96-38c9-4400-859c-461ae9a6024d",
                    "created_at": "2025-03-17 23:51:48",
                    "updated_at": "2025-03-17 23:51:48"
                  }
                },
                {
                  "player": {
                    "id": "ba7c13e5-7b86-436f-a9cd-e454eb0dbe6f",
                    "fullname": "Maricela Sánchez",
                    "city": "Moroleón",
                    "weight": "65.20",
                    "height": "1.70",
                    "age": 29,
                    "experience": 8,
                    "is_active": 1,
                    "created_at": "2025-03-17 23:51:48",
                    "updated_at": "2025-03-17 23:51:48"
                  },
                  "relationship": {
                    "id": "e36c443e-ef6d-45d6-895b-421549034889",
                    "player_id": "ba7c13e5-7b86-436f-a9cd-e454eb0dbe6f",
                    "pair_id": "4aeacf96-38c9-4400-859c-461ae9a6024d",
                    "created_at": "2025-03-17 23:51:48",
                    "updated_at": "2025-03-17 23:51:48"
                  }
                }
              ]
            },
            "relationship": {
              "id": "e04a06f3-f1e3-4eb9-b543-ae82c46346c4",
              "pair_id": "4aeacf96-38c9-4400-859c-461ae9a6024d",
              "match_id": "0858b8ee-0ccb-4764-94a7-1deb9d956c23",
              "score": 0,
              "is_winner": 0,
              "created_at": "2025-03-18 01:21:28",
              "updated_at": "2025-03-18 01:21:28"
            }
          },
          {
            "pair": {
              "id": "5dfbfd5c-26e2-4dbe-8bd6-1040a6cf1e10",
              "is_eliminated": 0,
              "is_active": 1,
              "created_at": "2025-03-17 23:51:47",
              "updated_at": "2025-03-17 23:51:47",
              "registration_category": {
                "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
                "name": "open",
                "description": "Libre"
              },
              "players": [
                {
                  "player": {
                    "id": "85640d17-888b-4894-b7ea-8ac695c32533",
                    "fullname": "Luis Hernández",
                    "city": "León",
                    "weight": "75.20",
                    "height": "1.78",
                    "age": 28,
                    "experience": 12,
                    "is_active": 1,
                    "created_at": "2025-03-17 23:51:47",
                    "updated_at": "2025-03-17 23:51:47"
                  },
                  "relationship": {
                    "id": "d40eeadd-7ec0-4e77-a8ea-4ea51407857c",
                    "player_id": "85640d17-888b-4894-b7ea-8ac695c32533",
                    "pair_id": "5dfbfd5c-26e2-4dbe-8bd6-1040a6cf1e10",
                    "created_at": "2025-03-17 23:51:47",
                    "updated_at": "2025-03-17 23:51:47"
                  }
                },
                {
                  "player": {
                    "id": "7649a11c-e9ed-4011-9e04-4cbd7e370907",
                    "fullname": "María Guzmán",
                    "city": "Guanajuato",
                    "weight": "62.50",
                    "height": "1.68",
                    "age": 24,
                    "experience": 8,
                    "is_active": 1,
                    "created_at": "2025-03-17 23:51:47",
                    "updated_at": "2025-03-17 23:51:47"
                  },
                  "relationship": {
                    "id": "f7694e51-38e7-4a04-8eaa-b812abb4e21e",
                    "player_id": "7649a11c-e9ed-4011-9e04-4cbd7e370907",
                    "pair_id": "5dfbfd5c-26e2-4dbe-8bd6-1040a6cf1e10",
                    "created_at": "2025-03-17 23:51:47",
                    "updated_at": "2025-03-17 23:51:47"
                  }
                }
              ]
            },
            "relationship": {
              "id": "fd42ed48-e145-469a-8f8e-57d2a2e11bd4",
              "pair_id": "5dfbfd5c-26e2-4dbe-8bd6-1040a6cf1e10",
              "match_id": "0858b8ee-0ccb-4764-94a7-1deb9d956c23",
              "score": 0,
              "is_winner": 0,
              "created_at": "2025-03-18 01:21:28",
              "updated_at": "2025-03-18 01:21:28"
            }
          }
        ]
      }
    },
    {
      "match": {
        "id": "0a328326-c541-4b3d-a9f7-ee22bcd2ca43",
        "group_id": "19dcf711-ac20-4be5-8bc9-daa27582c6c2",
        "is_active": 1,
        "created_at": "2025-03-18 01:21:28",
        "updated_at": "2025-03-18 01:21:28",
        "registration_category": {
          "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
          "name": "open",
          "description": "Libre"
        },
        "match_category": {
          "id": "75173798-35ea-4415-8ac4-89a8a2918600",
          "name": "qualifier",
          "description": "Clasificación"
        },
        "match_status": {
          "id": "02ee09c2-34bc-4f27-84ff-6ceca7c50882",
          "name": "scheduled",
          "description": "Programado"
        },
        "pairs": [
          {
            "pair": {
              "id": "e8786b51-94fa-4b71-8e71-781840a67685",
              "is_eliminated": 0,
              "is_active": 1,
              "created_at": "2025-03-17 23:51:48",
              "updated_at": "2025-03-17 23:51:48",
              "registration_category": {
                "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
                "name": "open",
                "description": "Libre"
              },
              "players": [
                {
                  "player": {
                    "id": "91cffd78-8883-4269-92b8-bd1405e5bed4",
                    "fullname": "Alberto Méndez",
                    "city": "San José Iturbide",
                    "weight": "77.50",
                    "height": "1.83",
                    "age": 33,
                    "experience": 13,
                    "is_active": 1,
                    "created_at": "2025-03-17 23:51:48",
                    "updated_at": "2025-03-17 23:51:48"
                  },
                  "relationship": {
                    "id": "e0a3cabb-5ade-487b-a908-3017c51908f5",
                    "player_id": "91cffd78-8883-4269-92b8-bd1405e5bed4",
                    "pair_id": "e8786b51-94fa-4b71-8e71-781840a67685",
                    "created_at": "2025-03-17 23:51:48",
                    "updated_at": "2025-03-17 23:51:48"
                  }
                },
                {
                  "player": {
                    "id": "32882818-4306-4698-a08f-35cd08b34f58",
                    "fullname": "Martha González",
                    "city": "Tierra Blanca",
                    "weight": "65.00",
                    "height": "1.70",
                    "age": 28,
                    "experience": 8,
                    "is_active": 1,
                    "created_at": "2025-03-17 23:51:48",
                    "updated_at": "2025-03-17 23:51:48"
                  },
                  "relationship": {
                    "id": "e392ca32-94bb-4fef-9e5f-10a9140d6e56",
                    "player_id": "32882818-4306-4698-a08f-35cd08b34f58",
                    "pair_id": "e8786b51-94fa-4b71-8e71-781840a67685",
                    "created_at": "2025-03-17 23:51:48",
                    "updated_at": "2025-03-17 23:51:48"
                  }
                }
              ]
            },
            "relationship": {
              "id": "76a7da90-679d-4460-87a0-086f000ec527",
              "pair_id": "e8786b51-94fa-4b71-8e71-781840a67685",
              "match_id": "0a328326-c541-4b3d-a9f7-ee22bcd2ca43",
              "score": 0,
              "is_winner": 0,
              "created_at": "2025-03-18 01:21:28",
              "updated_at": "2025-03-18 01:21:28"
            }
          },
          {
            "pair": {
              "id": "4aeacf96-38c9-4400-859c-461ae9a6024d",
              "is_eliminated": 0,
              "is_active": 1,
              "created_at": "2025-03-17 23:51:48",
              "updated_at": "2025-03-17 23:51:48",
              "registration_category": {
                "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
                "name": "open",
                "description": "Libre"
              },
              "players": [
                {
                  "player": {
                    "id": "39e1f248-7c69-40ce-9406-0b226c7207a5",
                    "fullname": "Jorge Medina",
                    "city": "Pueblo Nuevo",
                    "weight": "76.50",
                    "height": "1.82",
                    "age": 32,
                    "experience": 13,
                    "is_active": 1,
                    "created_at": "2025-03-17 23:51:48",
                    "updated_at": "2025-03-17 23:51:48"
                  },
                  "relationship": {
                    "id": "61197d8f-0a14-4d3b-8ab4-fb3ed23db98a",
                    "player_id": "39e1f248-7c69-40ce-9406-0b226c7207a5",
                    "pair_id": "4aeacf96-38c9-4400-859c-461ae9a6024d",
                    "created_at": "2025-03-17 23:51:48",
                    "updated_at": "2025-03-17 23:51:48"
                  }
                },
                {
                  "player": {
                    "id": "ba7c13e5-7b86-436f-a9cd-e454eb0dbe6f",
                    "fullname": "Maricela Sánchez",
                    "city": "Moroleón",
                    "weight": "65.20",
                    "height": "1.70",
                    "age": 29,
                    "experience": 8,
                    "is_active": 1,
                    "created_at": "2025-03-17 23:51:48",
                    "updated_at": "2025-03-17 23:51:48"
                  },
                  "relationship": {
                    "id": "e36c443e-ef6d-45d6-895b-421549034889",
                    "player_id": "ba7c13e5-7b86-436f-a9cd-e454eb0dbe6f",
                    "pair_id": "4aeacf96-38c9-4400-859c-461ae9a6024d",
                    "created_at": "2025-03-17 23:51:48",
                    "updated_at": "2025-03-17 23:51:48"
                  }
                }
              ]
            },
            "relationship": {
              "id": "f6c6ca0c-b1d3-4446-9ea7-1b92c4eae5ce",
              "pair_id": "4aeacf96-38c9-4400-859c-461ae9a6024d",
              "match_id": "0a328326-c541-4b3d-a9f7-ee22bcd2ca43",
              "score": 0,
              "is_winner": 0,
              "created_at": "2025-03-18 01:21:28",
              "updated_at": "2025-03-18 01:21:28"
            }
          }
        ]
      }
    },
    ... 
  ],
  "status": 200,
  "description": "Information about the group matches"
}
```
