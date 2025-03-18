# Grupos

Grupos generados.

```
[GET] /v1/groups
```

Parámetros de consulta:

| Parámetro | Tipo | Rango | Por defecto | Descripción |
| --------- | ---- | ----- | ----------- | ----------- |
| `page` | `integer` | `min_numeric: 1` | `1` | Número de la página de resultados de los grupos. |
| `filterBy` | `string` | `contains: [name, description]` | `name` | Campo de búsqueda de los grupos. |
| `orderBy` | `string` | `contains: [name, description, created_at, updated_at]` | `name` | Campo de ordenamiento de los grupos. |
| `sortBy` | `string` | `contains: [asc, desc]` | `asc` | Modo de ordenamiento de los grupos. |
| `registration_category_id` | `string` | `exact_len: 36` | `null` | Identificador de la categoría de inscripción de los grupos ([ver](../registration-categories/index.html)). |
| `is_eliminated` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar los grupos por estatus de eliminación. |
| `is_active` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar los grupos por estatus de actividad. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/groups?page=2&filterBy=name&orderBy=name&sortBy=asc&is_eliminated=false&is_active=true
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "55d0ace0-ecb9-4060-b294-d71a1c102c71",
      "name": "A_2025",
      "description": "A",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-18 01:59:29",
      "updated_at": "2025-03-18 01:59:29",
      "registration_category": {
        "id": "cba89529-0ba9-49e4-85ad-83e63c8e9d7e",
        "name": "seniors",
        "description": "50 y más"
      }
    },
    {
      "id": "b77966a1-42b4-478c-b145-4ff0e4a248ed",
      "name": "A_2025",
      "description": "A",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-18 01:59:28",
      "updated_at": "2025-03-18 01:59:28",
      "registration_category": {
        "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
        "name": "open",
        "description": "Libre"
      }
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
  "description": "Information about all the groups with pagination"
}
```
