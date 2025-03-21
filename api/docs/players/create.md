# ➕ Crear un jugador

```
[POST] /v1/players
```

Cuerpo de la petición:

| Campo | Tipo | Requerido | Rango | Descripción |
| ----- | ---- | --------- | ----- | ----------- |
| `fullname` | `string` | `true` | `between_len: [1, 128]` | Nombre completo del jugador. |
| `city` | `string` | `true` | `between_len: [1, 128]` | Ciudad o localidad de origen del jugador. |
| `weight` | `float` | `true` | `between_numeric: [20, 600]` | Peso en kilos del jugador. |
| `height` | `float` | `true` | `between_numeric: [0.5, 2.5]` | Estatura en metros del jugador. |
| `age` | `integer` | `true` | `between_numeric: [14, 122]` | Edad del jugador. |
| `experience` | `integer` | `true` | `between_numeric: [0, 50]` | Tiempo en años que el jugador ha practicado el deporte. |

Ejemplo:

```bash
curl -X POST \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/players \
  -d '{
    "fullname": "Francisco Javier Solís Martínez",
    "city": "Irapuato",
    "weight": "70",
    "height": "1.70",
    "age": "25",
    "experience": "5"
  }'
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "cbfee9f9-0d0a-4b0c-9ede-0628fc2a3387",
    "fullname": "Francisco Javier Solís Martínez",
    "city": "Irapuato",
    "weight": "70.00",
    "height": "1.70",
    "age": 25,
    "experience": 5,
    "is_active": 1,
    "created_at": "2025-03-13 22:37:14",
    "updated_at": "2025-03-13 22:37:14"
  },
  "status": 201,
  "description": "The player was created successfully"
}
```
