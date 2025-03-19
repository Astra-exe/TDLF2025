# Parejas de los grupos

Grupos de parejas asignados.

```
[GET] /v1/groups/pairs
```

Parámetros de consulta:

| Parámetro | Tipo | Rango | Por defecto | Descripción |
| --------- | ---- | ----- | ----------- | ----------- |
| `page` | `integer` | `min_numeric: 1` | `1` | Número de la página de resultados de los grupos con sus parejas. |
| `filterBy` | `string` | `contains: [name, description]` | `name` | Campo de búsqueda de los grupos con sus parejas. |
| `orderBy` | `string` | `contains: [name, description, created_at, updated_at]` | `name` | Campo de ordenamiento de los grupos con sus parejas. |
| `sortBy` | `string` | `contains: [asc, desc]` | `asc` | Modo de ordenamiento de los grupos con sus parejas. |
| `registration_category_id` | `string` | `exact_len: 36` | `null` | Identificador de la categoría de inscripción de los grupos con sus parejas ([ver](../registration-categories/index.html)). |
| `is_eliminated` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar los grupos con sus parejas por estatus de eliminación. |
| `is_active` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar los grupos con sus parejas por estatus de actividad. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/groups/pairs?page=2&filterBy=name&orderBy=name&sortBy=asc&registration_category_id=cba89529-0ba9-49e4-85ad-83e63c8e9d7e&is_eliminated=false&is_active=true
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "group": {
        "id": "2f0a8d32-0e8e-47a8-a7d5-5518150840a4",
        "name": "A_2025",
        "description": "A",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-18 14:41:31",
        "updated_at": "2025-03-18 14:41:31",
        "registration_category": {
          "id": "76d95a95-0fa3-4d58-a8ce-031a1db25b3c",
          "name": "open",
          "description": "Libre"
        }
      },
      "pairs": [
        {
          "pair": {
            "id": "cef12779-c452-48ac-8643-da4bc2a1b9e6",
            "is_eliminated": 0,
            "is_active": 1,
            "created_at": "2025-03-18 14:37:31",
            "updated_at": "2025-03-18 14:37:31",
            "registration_category": {
              "id": "76d95a95-0fa3-4d58-a8ce-031a1db25b3c",
              "name": "open",
              "description": "Libre"
            }
          },
          "relationship": {
            "id": "14e8b8d1-67ef-4ae0-b744-6cb9073e2117",
            "pair_id": "cef12779-c452-48ac-8643-da4bc2a1b9e6",
            "group_id": "2f0a8d32-0e8e-47a8-a7d5-5518150840a4",
            "created_at": "2025-03-18 14:41:31",
            "updated_at": "2025-03-18 14:41:31"
          }
        },
        {
          "pair": {
            "id": "09d70fe7-a834-4c08-a39b-edf33aa84e6a",
            "is_eliminated": 0,
            "is_active": 1,
            "created_at": "2025-03-18 14:37:30",
            "updated_at": "2025-03-18 14:37:30",
            "registration_category": {
              "id": "76d95a95-0fa3-4d58-a8ce-031a1db25b3c",
              "name": "open",
              "description": "Libre"
            }
          },
          "relationship": {
            "id": "5a2889d0-f8f5-4971-921c-b6b6cc9af7af",
            "pair_id": "09d70fe7-a834-4c08-a39b-edf33aa84e6a",
            "group_id": "2f0a8d32-0e8e-47a8-a7d5-5518150840a4",
            "created_at": "2025-03-18 14:41:31",
            "updated_at": "2025-03-18 14:41:31"
          }
        },
        {
          "pair": {
            "id": "cf5699f7-3b7e-45f1-b693-176f44d7d870",
            "is_eliminated": 0,
            "is_active": 1,
            "created_at": "2025-03-18 14:37:30",
            "updated_at": "2025-03-18 14:37:30",
            "registration_category": {
              "id": "76d95a95-0fa3-4d58-a8ce-031a1db25b3c",
              "name": "open",
              "description": "Libre"
            }
          },
          "relationship": {
            "id": "a027914d-ecc5-483a-ba9a-0b401f9ce1ea",
            "pair_id": "cf5699f7-3b7e-45f1-b693-176f44d7d870",
            "group_id": "2f0a8d32-0e8e-47a8-a7d5-5518150840a4",
            "created_at": "2025-03-18 14:41:31",
            "updated_at": "2025-03-18 14:41:31"
          }
        },
        {
          "pair": {
            "id": "b6fb3f1e-7c0a-4a35-ab1e-2ba95dc8bc29",
            "is_eliminated": 0,
            "is_active": 1,
            "created_at": "2025-03-18 14:37:31",
            "updated_at": "2025-03-18 14:37:31",
            "registration_category": {
              "id": "76d95a95-0fa3-4d58-a8ce-031a1db25b3c",
              "name": "open",
              "description": "Libre"
            }
          },
          "relationship": {
            "id": "deab84a1-0929-4336-80b5-5c749d03ba9f",
            "pair_id": "b6fb3f1e-7c0a-4a35-ab1e-2ba95dc8bc29",
            "group_id": "2f0a8d32-0e8e-47a8-a7d5-5518150840a4",
            "created_at": "2025-03-18 14:41:31",
            "updated_at": "2025-03-18 14:41:31"
          }
        }
      ]
    },
    {
      "group": {
        "id": "5a478de5-5be1-482f-8d44-b98a79d1552c",
        "name": "A_2025",
        "description": "A",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-18 14:41:31",
        "updated_at": "2025-03-18 14:41:31",
        "registration_category": {
          "id": "eb69a503-6eb3-4f20-b30b-c9a4762a8cfd",
          "name": "seniors",
          "description": "50 y más"
        }
      },
      "pairs": [
        {
          "pair": {
            "id": "ec922b7a-6984-474d-af7b-5afe16e8db5d",
            "is_eliminated": 0,
            "is_active": 1,
            "created_at": "2025-03-18 14:40:07",
            "updated_at": "2025-03-18 14:40:07",
            "registration_category": {
              "id": "eb69a503-6eb3-4f20-b30b-c9a4762a8cfd",
              "name": "seniors",
              "description": "50 y más"
            }
          },
          "relationship": {
            "id": "8812be18-60a0-447d-90c6-1b35554510d1",
            "pair_id": "ec922b7a-6984-474d-af7b-5afe16e8db5d",
            "group_id": "5a478de5-5be1-482f-8d44-b98a79d1552c",
            "created_at": "2025-03-18 14:41:31",
            "updated_at": "2025-03-18 14:41:31"
          }
        },
        {
          "pair": {
            "id": "6417ef86-4a3b-4ee8-b89e-1bbb48696e67",
            "is_eliminated": 0,
            "is_active": 1,
            "created_at": "2025-03-18 14:40:07",
            "updated_at": "2025-03-18 14:40:07",
            "registration_category": {
              "id": "eb69a503-6eb3-4f20-b30b-c9a4762a8cfd",
              "name": "seniors",
              "description": "50 y más"
            }
          },
          "relationship": {
            "id": "9a4e6ddd-ec57-491d-907f-b4b834f2da4d",
            "pair_id": "6417ef86-4a3b-4ee8-b89e-1bbb48696e67",
            "group_id": "5a478de5-5be1-482f-8d44-b98a79d1552c",
            "created_at": "2025-03-18 14:41:31",
            "updated_at": "2025-03-18 14:41:31"
          }
        },
        {
          "pair": {
            "id": "087a1273-19c8-4ccf-8751-b2db6811f1cc",
            "is_eliminated": 0,
            "is_active": 1,
            "created_at": "2025-03-18 14:40:07",
            "updated_at": "2025-03-18 14:40:07",
            "registration_category": {
              "id": "eb69a503-6eb3-4f20-b30b-c9a4762a8cfd",
              "name": "seniors",
              "description": "50 y más"
            }
          },
          "relationship": {
            "id": "d573b626-36e1-46fc-90ab-3adb51f0acb6",
            "pair_id": "087a1273-19c8-4ccf-8751-b2db6811f1cc",
            "group_id": "5a478de5-5be1-482f-8d44-b98a79d1552c",
            "created_at": "2025-03-18 14:41:31",
            "updated_at": "2025-03-18 14:41:31"
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
  "description": "Information about all the groups pairs with pagination"
}
```
