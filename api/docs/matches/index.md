# Partidos

Partidos asignados.

```
[GET] /v1/matches
```

Parámetros de consulta:

| Parámetro | Tipo | Rango | Por defecto | Descripción |
| --------- | ---- | ----- | ----------- | ----------- |
| `page` | `integer` | `min_numeric: 1` | `1` | Número de la página de resultados de los partidos. |
| `orderBy` | `string` | `contains: [created_at, updated_at]` | `created_at` | Campo de ordenamiento de los partidos. |
| `sortBy` | `string` | `contains: [asc, desc]` | `desc` | Modo de ordenamiento de los partidos. |
| `registration_category_id` | `string` | `exact_len: 36` | `null` | Identificador de la categoría de inscripción de los partidos ([ver](../registration-categories/index.html)). |
| `group_id` | `string` | `exact_len: 36` | `null` | Identificador del grupo de los partidos ([ver](../groups/index.html)). |
| `match_category_id` | `string` | `exact_len: 36` | `null` | Identificador de la categoría de las rondas de los partidos ([ver](../match-categories/index.html)). |
| `match_status_id` | `string` | `exact_len: 36` | `null` | Identificador del estatus de juego de los partidos ([ver](../match-status/index.html)). |
| `is_active` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar los partidos por estatus de actividad. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/matches?page=2&orderBy=created_at&sortBy=desc&registration_category_id=cba89529-0ba9-49e4-85ad-83e63c8e9d7e&group_id=c236d76f-e834-40a1-8080-9f78a9a299f2&match_category_id=dc19c9bf-4339-4ed2-a603-5b2dd1058a6&match_status_id=29d4b630-468f-4dcc-b775-5bad0b796a89&is_active=true
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "fd73aa9c-fac8-4761-a6ba-12c674612929",
      "group_id": "f5c3df23-f459-4a36-912e-50736614df95",
      "is_active": 1,
      "created_at": "2025-03-18 14:41:31",
      "updated_at": "2025-03-18 14:41:31",
      "registration_category": {
        "id": "76d95a95-0fa3-4d58-a8ce-031a1db25b3c",
        "name": "open",
        "description": "Libre"
      },
      "match_category": {
        "id": "6c7f2686-7b40-47ff-b5b5-cbd52c6cea89",
        "name": "qualifier",
        "description": "Clasificación"
      },
      "match_status": {
        "id": "29d4b630-468f-4dcc-b775-5bad0b796a89",
        "name": "scheduled",
        "description": "Programado"
      }
    },
    {
      "id": "097c1b44-1bed-40fe-b522-ced60e91c185",
      "group_id": "f5c3df23-f459-4a36-912e-50736614df95",
      "is_active": 1,
      "created_at": "2025-03-18 14:41:31",
      "updated_at": "2025-03-18 14:41:31",
      "registration_category": {
        "id": "76d95a95-0fa3-4d58-a8ce-031a1db25b3c",
        "name": "open",
        "description": "Libre"
      },
      "match_category": {
        "id": "6c7f2686-7b40-47ff-b5b5-cbd52c6cea89",
        "name": "qualifier",
        "description": "Clasificación"
      },
      "match_status": {
        "id": "29d4b630-468f-4dcc-b775-5bad0b796a89",
        "name": "scheduled",
        "description": "Programado"
      }
    },
    ...
  ],
  "status": 200,
  "pagination": {
    "page": 1,
    "limit": 8,
    "total": 6,
    "count": 48,
    "offset": 0
  },
  "description": "Information about all the matches with pagination"
}
```
