# Jugadores

Jugadores inscritos al torneo.

```
[GET] /v1/players
```

Parámetros de consulta:

| Parámetro | Tipo | Rango | Por defecto | Descripción |
| --------- | ---- | ----- | ----------- | ----------- |
| `page` | `integer` | `min_numeric: 1` | `1` | Número de la página de resultados de los jugadores. |
| `search` | `string` | `max_len: 255` | `''` | Patrón de búsqueda de los jugadores. |
| `filterBy` | `string` | `contains: [fullname]` | `fullname` | Campo de búsqueda de los jugadores. |
| `orderBy` | `string` | `contains: [fullname, weight, height, age, experience, created_at, updated_at]` | `created_at` | Campo de ordenamiento de los jugadores. |
| `sortBy` | `string` | `contains: [asc, desc]` | `desc` | Modo de ordenamiento de los jugadores. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/players?page=2&search=Ricardo&filterBy=fullname&orderBy=age&sortBy=asc
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "0e7145c8-c149-418c-9d39-18f898723230",
      "fullname": "Ricardo García Jiménez",
      "city": "Salvatierra",
      "weight": "120.00",
      "height": "1.82",
      "age": 26,
      "experience": 0,
      "is_active": 1,
      "created_at": "2025-03-05 13:45:20",
      "updated_at": "2025-03-05 13:45:20"
    },
    {
      "id": "2310ebf9-40ed-465a-9678-409433918f3e",
      "fullname": "Juan José Ramírez López",
      "city": "Irapuato",
      "weight": "70.00",
      "height": "1.65",
      "age": 25,
      "experience": 5,
      "is_active": 1,
      "created_at": "2025-03-05 13:45:20",
      "updated_at": "2025-03-05 13:45:20"
    }
  ],
  "status": 200,
  "pagination": {
    "page": 1,
    "limit": 8,
    "total": 1,
    "count": 2,
    "offset": 0
  },
  "description": "Information about all the players with pagination"
}
```
