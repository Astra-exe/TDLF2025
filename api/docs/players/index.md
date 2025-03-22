# 🏃‍♂️ Jugadores

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
| `is_active` | `boolean` | `contains: [yes/no, on/off, 1/0, true/false]` | `null` | Filtrar los jugadores por estatus de actividad. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/players?page=2&search=Ricardo&filterBy=fullname&orderBy=age&sortBy=asc&is_active=true
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "07b80796-fd26-4b1b-9f5d-6330e96ed849",
      "fullname": "Ricardo García Jiménez",
      "city": "Salvatierra",
      "weight": "120.00",
      "height": "1.82",
      "age": 26,
      "experience": 0,
      "is_active": 1,
      "created_at": "2025-03-07 14:44:28",
      "updated_at": "2025-03-07 14:44:28"
    },
    {
      "id": "b7f22815-7082-41ac-9ba5-0e43022d7d5f",
      "fullname": "Juan José Ramírez López",
      "city": "Irapuato",
      "weight": "70.00",
      "height": "1.65",
      "age": 25,
      "experience": 5,
      "is_active": 1,
      "created_at": "2025-03-07 14:44:28",
      "updated_at": "2025-03-07 14:44:28"
    },
    ...
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
