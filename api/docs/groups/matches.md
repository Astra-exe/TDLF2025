# Partidos de las parejas del grupo

```
[GET] /v1/groups/@id/matches
```

Ejemplo:

 ```bash
 curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/groups/@id/matches
 ```

Respuesta de la petición:

```json
{
  "data": [
    {
      "match": {
        "id": "2c7578c6-38d9-4e97-bc29-3c9332ff809f",
        "group_id": "6fa6b6d5-eca2-4f70-a004-df7535b9ec8f",
        "is_active": 1,
        "created_at": "2025-03-17 21:54:06",
        "updated_at": "2025-03-17 21:54:06",
        "registration_category": {
          "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
          "name": "open",
          "description": "Libre"
        },
        "match_status": {
          "id": "02ee09c2-34bc-4f27-84ff-6ceca7c50882",
          "name": "scheduled",
          "description": "Programado"
        },
        "pairs": [
          {
            "pair": {
              "id": "0dee717e-4b9f-4565-b0b5-8c3906cb8093",
              "is_eliminated": 0,
              "is_active": 1,
              "created_at": "2025-03-17 21:53:30",
              "updated_at": "2025-03-17 21:53:30",
              "registration_category": {
                "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
                "name": "open",
                "description": "Libre"
              },
              "players": [
                {
                  "player": {
                    "id": "79e9cb8a-5862-4721-aa98-cae0171fa98a",
                    "fullname": "Miguel Ángel",
                    "city": "Apaseo el Grande",
                    "weight": "79.50",
                    "height": "1.84",
                    "age": 33,
                    "experience": 13,
                    "is_active": 1,
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  },
                  "relationship": {
                    "id": "913ce1a1-7930-40db-8543-8d1983af6ced",
                    "player_id": "79e9cb8a-5862-4721-aa98-cae0171fa98a",
                    "pair_id": "0dee717e-4b9f-4565-b0b5-8c3906cb8093",
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  }
                },
                {
                  "player": {
                    "id": "17077e5a-92d3-42c6-ab61-fbc3bb94df75",
                    "fullname": "Gabriela Jiménez",
                    "city": "Uriangato",
                    "weight": "66.20",
                    "height": "1.72",
                    "age": 28,
                    "experience": 10,
                    "is_active": 1,
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  },
                  "relationship": {
                    "id": "eb365188-683c-459e-9ef6-ccebbe13cc88",
                    "player_id": "17077e5a-92d3-42c6-ab61-fbc3bb94df75",
                    "pair_id": "0dee717e-4b9f-4565-b0b5-8c3906cb8093",
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  }
                }
              ]
            },
            "relationship": {
              "id": "0d82b971-7f9c-4b47-9ac8-c300bfe95822",
              "pair_id": "0dee717e-4b9f-4565-b0b5-8c3906cb8093",
              "match_id": "2c7578c6-38d9-4e97-bc29-3c9332ff809f",
              "score": 0,
              "is_winner": 0,
              "created_at": "2025-03-17 21:54:06",
              "updated_at": "2025-03-17 21:54:06"
            }
          },
          {
            "pair": {
              "id": "ca87508b-afcf-4b1e-a378-abc0fcc0769c",
              "is_eliminated": 0,
              "is_active": 1,
              "created_at": "2025-03-17 21:53:30",
              "updated_at": "2025-03-17 21:53:30",
              "registration_category": {
                "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
                "name": "open",
                "description": "Libre"
              },
              "players": [
                {
                  "player": {
                    "id": "7d62bb8f-09cd-4937-bbc8-a4e8f80de3c3",
                    "fullname": "Sofía López",
                    "city": "San Miguel de Allende",
                    "weight": "65.00",
                    "height": "1.70",
                    "age": 29,
                    "experience": 9,
                    "is_active": 1,
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  },
                  "relationship": {
                    "id": "7ad7ea8d-e2d4-4424-acaa-3768b7fd8012",
                    "player_id": "7d62bb8f-09cd-4937-bbc8-a4e8f80de3c3",
                    "pair_id": "ca87508b-afcf-4b1e-a378-abc0fcc0769c",
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  }
                },
                {
                  "player": {
                    "id": "570ebc25-907b-428a-974f-463030b7db21",
                    "fullname": "Javier Torres",
                    "city": "Salamanca",
                    "weight": "80.00",
                    "height": "1.85",
                    "age": 35,
                    "experience": 15,
                    "is_active": 1,
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  },
                  "relationship": {
                    "id": "8eb22cbe-2496-484e-9c18-4d13cd059bee",
                    "player_id": "570ebc25-907b-428a-974f-463030b7db21",
                    "pair_id": "ca87508b-afcf-4b1e-a378-abc0fcc0769c",
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  }
                }
              ]
            },
            "relationship": {
              "id": "d4c11946-3d0c-40bb-aa14-399b15628778",
              "pair_id": "ca87508b-afcf-4b1e-a378-abc0fcc0769c",
              "match_id": "2c7578c6-38d9-4e97-bc29-3c9332ff809f",
              "score": 0,
              "is_winner": 0,
              "created_at": "2025-03-17 21:54:06",
              "updated_at": "2025-03-17 21:54:06"
            }
          }
        ]
      }
    },
    {
      "match": {
        "id": "89ee7e96-958a-4e7a-930d-8f75d834f86e",
        "group_id": "6fa6b6d5-eca2-4f70-a004-df7535b9ec8f",
        "is_active": 1,
        "created_at": "2025-03-17 21:54:06",
        "updated_at": "2025-03-17 21:54:06",
        "registration_category": {
          "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
          "name": "open",
          "description": "Libre"
        },
        "match_status": {
          "id": "02ee09c2-34bc-4f27-84ff-6ceca7c50882",
          "name": "scheduled",
          "description": "Programado"
        },
        "pairs": [
          {
            "pair": {
              "id": "210fca16-c98c-4182-a14f-823fde1d6210",
              "is_eliminated": 0,
              "is_active": 1,
              "created_at": "2025-03-17 21:53:30",
              "updated_at": "2025-03-17 21:53:30",
              "registration_category": {
                "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
                "name": "open",
                "description": "Libre"
              },
              "players": [
                {
                  "player": {
                    "id": "dc908c32-7951-423d-831b-29007f5cf98c",
                    "fullname": "Ana Ramírez",
                    "city": "Irapuato",
                    "weight": "63.10",
                    "height": "1.65",
                    "age": 26,
                    "experience": 7,
                    "is_active": 1,
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  },
                  "relationship": {
                    "id": "c5c263a9-601e-4a5b-b827-85d55523b7af",
                    "player_id": "dc908c32-7951-423d-831b-29007f5cf98c",
                    "pair_id": "210fca16-c98c-4182-a14f-823fde1d6210",
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  }
                },
                {
                  "player": {
                    "id": "2d9b9633-cac7-4e48-a969-a4f1e0603a28",
                    "fullname": "Carlos Martínez",
                    "city": "Celaya",
                    "weight": "78.40",
                    "height": "1.80",
                    "age": 32,
                    "experience": 10,
                    "is_active": 1,
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  },
                  "relationship": {
                    "id": "d32b9729-ccb6-46fa-b9ce-c62f217bd132",
                    "player_id": "2d9b9633-cac7-4e48-a969-a4f1e0603a28",
                    "pair_id": "210fca16-c98c-4182-a14f-823fde1d6210",
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  }
                }
              ]
            },
            "relationship": {
              "id": "455d786a-8df9-4b11-b50f-5d6d35a5f118",
              "pair_id": "210fca16-c98c-4182-a14f-823fde1d6210",
              "match_id": "89ee7e96-958a-4e7a-930d-8f75d834f86e",
              "score": 0,
              "is_winner": 0,
              "created_at": "2025-03-17 21:54:06",
              "updated_at": "2025-03-17 21:54:06"
            }
          },
          {
            "pair": {
              "id": "da671096-f0ff-4b6a-b63a-4ad68d5d187b",
              "is_eliminated": 0,
              "is_active": 1,
              "created_at": "2025-03-17 21:53:30",
              "updated_at": "2025-03-17 21:53:30",
              "registration_category": {
                "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
                "name": "open",
                "description": "Libre"
              },
              "players": [
                {
                  "player": {
                    "id": "656adb45-241c-449e-90d8-9481e2e7a001",
                    "fullname": "Elena Morales",
                    "city": "Purísima del Rincón",
                    "weight": "64.00",
                    "height": "1.69",
                    "age": 23,
                    "experience": 5,
                    "is_active": 1,
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  },
                  "relationship": {
                    "id": "35b8eda9-da72-488f-85fa-6260fd4cb2fd",
                    "player_id": "656adb45-241c-449e-90d8-9481e2e7a001",
                    "pair_id": "da671096-f0ff-4b6a-b63a-4ad68d5d187b",
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  }
                },
                {
                  "player": {
                    "id": "c1a91924-9fd6-4c75-9ee9-a8bd00b1e4c4",
                    "fullname": "Diego Fernández",
                    "city": "Moroleón",
                    "weight": "77.00",
                    "height": "1.82",
                    "age": 27,
                    "experience": 8,
                    "is_active": 1,
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  },
                  "relationship": {
                    "id": "d7e4b75f-d0e2-4594-a554-043abc92eeec",
                    "player_id": "c1a91924-9fd6-4c75-9ee9-a8bd00b1e4c4",
                    "pair_id": "da671096-f0ff-4b6a-b63a-4ad68d5d187b",
                    "created_at": "2025-03-17 21:53:30",
                    "updated_at": "2025-03-17 21:53:30"
                  }
                }
              ]
            },
            "relationship": {
              "id": "7fd9bcff-9419-4957-bb53-db4b5efff6cd",
              "pair_id": "da671096-f0ff-4b6a-b63a-4ad68d5d187b",
              "match_id": "89ee7e96-958a-4e7a-930d-8f75d834f86e",
              "score": 0,
              "is_winner": 0,
              "created_at": "2025-03-17 21:54:06",
              "updated_at": "2025-03-17 21:54:06"
            }
          }
        ]
      }
    },
    ...,
  ],
  "status": 200,
  "description": "Information about the group matches"
}
```
