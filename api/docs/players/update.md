# Modificar un jugador

```
[PUT] /v1/players/@id
```

Cuerpo de la petición:

| Campo | Tipo | Requerido | Rango | Descripción |
| ----- | ---- | --------- | ----- | ----------- |
| `fullname` | `string` | `false` | `between_len: [1, 128]` | Nombre completo del jugador. |
| `city` | `string` | `false` | `between_len: [1, 128]` | Ciudad o localidad de origen del jugador. |
| `weight` | `float` | `false` | `between_numeric: [20, 600]` | Peso en kilos del jugador. |
| `height` | `float` | `false` | `between_numeric: [0.5, 2.5]` | Estatura en metros del jugador. |
| `age` | `integer` | `false` | `between_numeric: [14, 122]` | Edad del jugador. |
| `experience` | `integer` | `false` | `between_numeric: [0, 50]` | Tiempo en años que el jugador ha practicado el deporte. |
| `is_active` | `boolean` | `false` | `contains: [yes/no, on/off, 1/0, true/false]` | Estatus de actividad del jugador. |

Ejemplo:

```bash
curl -X PUT \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/players/@id \
  -d '{
    "fullname": "Francisco Javier Solís Martínez",
    "city": "Irapuato",
    "weight": "72",
    "height": "1.72",
    "age": "26",
    "experience": "6",
    "is_active": "0"
  }'
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "0cd08ef4-d0dd-4ed1-ae38-af886b932c20",
    "fullname": "Francisco Javier Solís Martínez",
    "city": "Irapuato",
    "weight": "72.00",
    "height": "1.72",
    "age": 26,
    "experience": 6,
    "is_active": 0,
    "created_at": "2025-03-19 00:56:00",
    "updated_at": "2025-03-19 00:58:16"
  },
  "status": 200,
  "description": "The player was updated successfully"
}
```
