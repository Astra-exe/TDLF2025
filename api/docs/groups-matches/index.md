# Partidos de los grupos

Partidos asignados a los grupos.

```
[GET] /v1/groups/matches
```

Parámetros de consulta:

| Parámetro | Tipo | Rango | Por defecto | Descripción |
| --------- | ---- | ----- | ----------- | ----------- |
| `page` | `integer` | `min_numeric: 1` | `1` | Número de la página de resultados de los grupos con sus partidos. |
| `filterBy` | `string` | `contains: [name, description]` | `name` | Campo de búsqueda de los grupos con sus partidos. |
| `orderBy` | `string` | `contains: [name, description, created_at, updated_at]` | `name` | Campo de ordenamiento de los grupos con sus partidos. |
| `sortBy` | `string` | `contains: [asc, desc]` | `asc` | Modo de ordenamiento de los grupos con sus partidos. |
| `registration_category_id` | `string` | `exact_len: 36` | `null` | Identificador de la categoría de inscripción de los grupos con sus partidos ([ver](../registration-categories/index.html)). |
| `is_eliminated` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar los grupos con sus partidos por estatus de eliminación. |
| `is_active` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar los grupos con sus partidos por estatus de actividad. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/groups/matches?page=2&filterBy=name&orderBy=name&sortBy=asc&registration_category_id=cba89529-0ba9-49e4-85ad-83e63c8e9d7e&is_eliminated=false&is_active=true
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "group": {
        "id": "af30be04-7be1-47a9-afd7-c2faa611cf5a",
        "name": "A_2025",
        "description": "A",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-20 21:27:39",
        "updated_at": "2025-03-20 21:27:39",
        "registration_category": {
          "id": "21c13c24-af5d-45bd-9294-2de7e175ceee",
          "name": "seniors",
          "description": "50 y más"
        }
      },
      "matches": [
        {
          "match": {
            "id": "537b09ef-1f93-40cc-b774-8b454cae31f8",
            "is_active": 1,
            "created_at": "2025-03-20 21:27:39",
            "updated_at": "2025-03-20 21:27:39",
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
            }
          },
          "relationship": {
            "id": "fce0a11f-1550-465d-914f-a732ba531423",
            "group_id": "af30be04-7be1-47a9-afd7-c2faa611cf5a",
            "match_id": "537b09ef-1f93-40cc-b774-8b454cae31f8",
            "created_at": "2025-03-20 21:27:39",
            "updated_at": "2025-03-20 21:27:39"
          }
        },
        {
          "match": {
            "id": "5d9334eb-6f35-4c28-90bc-d7fe0ebbf50b",
            "is_active": 1,
            "created_at": "2025-03-20 21:27:39",
            "updated_at": "2025-03-20 21:27:39",
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
            }
          },
          "relationship": {
            "id": "4158d9fe-54ae-45c4-91fc-d5738880a0a7",
            "group_id": "af30be04-7be1-47a9-afd7-c2faa611cf5a",
            "match_id": "5d9334eb-6f35-4c28-90bc-d7fe0ebbf50b",
            "created_at": "2025-03-20 21:27:39",
            "updated_at": "2025-03-20 21:27:39"
          }
        },
        {
          "match": {
            "id": "fb905589-2dda-43f4-aed3-e7e4323bff36",
            "is_active": 1,
            "created_at": "2025-03-20 21:27:39",
            "updated_at": "2025-03-20 21:27:39",
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
            }
          },
          "relationship": {
            "id": "5dae6c51-e966-4d1a-87f0-ccf4fac0c3ca",
            "group_id": "af30be04-7be1-47a9-afd7-c2faa611cf5a",
            "match_id": "fb905589-2dda-43f4-aed3-e7e4323bff36",
            "created_at": "2025-03-20 21:27:39",
            "updated_at": "2025-03-20 21:27:39"
          }
        }
      ]
    },
    {
      "group": {
        "id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
        "name": "A_2025",
        "description": "A",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-20 21:27:39",
        "updated_at": "2025-03-20 21:27:39",
        "registration_category": {
          "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
          "name": "open",
          "description": "Libre"
        }
      },
      "matches": [
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
            }
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
            }
          },
          "relationship": {
            "id": "4e68dbaa-759e-47f0-a300-6b0630fe4d26",
            "group_id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
            "match_id": "5ef5e266-002f-4934-a11a-3fcb18d53394",
            "created_at": "2025-03-20 21:27:39",
            "updated_at": "2025-03-20 21:27:39"
          }
        },
        {
          "match": {
            "id": "66076df0-c5e6-4cab-a79a-ace28bb79421",
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
            }
          },
          "relationship": {
            "id": "e9fb6819-991f-4891-a98f-c0c8ae9bc1d6",
            "group_id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
            "match_id": "66076df0-c5e6-4cab-a79a-ace28bb79421",
            "created_at": "2025-03-20 21:27:39",
            "updated_at": "2025-03-20 21:27:39"
          }
        },
        {
          "match": {
            "id": "876608be-f594-4911-98d2-49e9c05cbb99",
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
            }
          },
          "relationship": {
            "id": "eb40d282-689a-4cb9-99f5-6c5ca50e0a64",
            "group_id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
            "match_id": "876608be-f594-4911-98d2-49e9c05cbb99",
            "created_at": "2025-03-20 21:27:39",
            "updated_at": "2025-03-20 21:27:39"
          }
        },
        {
          "match": {
            "id": "99348b26-8323-4674-81ea-4e6c93da5798",
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
            }
          },
          "relationship": {
            "id": "a12c06fc-3b75-453d-99dd-884ce420d3dc",
            "group_id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
            "match_id": "99348b26-8323-4674-81ea-4e6c93da5798",
            "created_at": "2025-03-20 21:27:39",
            "updated_at": "2025-03-20 21:27:39"
          }
        },
        {
          "match": {
            "id": "b91a8d6b-9063-443d-a627-cc5e07fe6b2c",
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
            }
          },
          "relationship": {
            "id": "ce404089-6724-41db-8b13-e66f1e32ec7a",
            "group_id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
            "match_id": "b91a8d6b-9063-443d-a627-cc5e07fe6b2c",
            "created_at": "2025-03-20 21:27:39",
            "updated_at": "2025-03-20 21:27:39"
          }
        }
      ]
    },
    ...
  ],
  "status": 200,
  "pagination": {
    "page": 1,
    "limit": 8,
    "total": 2,
    "count": 10,
    "offset": 0
  },
  "description": "Information about all the groups matches with pagination"
}
```
