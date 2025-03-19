# Parejas

Parejas inscritas al torneo.

```
[GET] /v1/pairs
```

Parámetros de consulta:

| Parámetro | Tipo | Rango | Por defecto | Descripción |
| --------- | ---- | ----- | ----------- | ----------- |
| `page` | `integer` | `min_numeric: 1` | `1` | Número de la página de resultados de las parejas. |
| `orderBy` | `string` | `contains: [created_at, updated_at]` | `created_at` | Campo de ordenamiento de las parejas. |
| `sortBy` | `string` | `contains: [asc, desc]` | `desc` | Modo de ordenamiento de las parejas. |
| `registration_category_id` | `string` | `exact_len: 36` | `null` | Identificador de la categoría de inscripción de las parejas ([ver](../registration-categories/index.html)). |
| `is_eliminated` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar las parejas por estatus de eliminación. |
| `is_active` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar las parejas por estatus de actividad. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/pairs?page=2&orderBy=created_at&sortBy=desc&registration_category_id=cba89529-0ba9-49e4-85ad-83e63c8e9d7e&is_eliminated=true&is_active=true
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "a0b84d91-9a78-4534-ab8f-691405622eb9",
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
    {
      "id": "66478a05-50af-4e8f-bfb3-13fe79e1cb4e",
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
    ...
  ],
  "status": 200,
  "pagination": {
    "page": 1,
    "limit": 8,
    "total": 5,
    "count": 36,
    "offset": 0
  },
  "description": "Information about all the pairs with pagination"
}
```
