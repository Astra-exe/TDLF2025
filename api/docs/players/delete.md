# Eliminar un jugador

```
[DELETE] /v1/players/@id
```

> El jugador no debe contener información asociada a una pareja.

Parámetros de la petición:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del jugador. |

Ejemplo:

```bash
curl -X DELETE \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/players/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "004b7a08-6bf0-4852-b0dd-4783058e2d2a",
    "fullname": "Ricardo García Jiménez",
    "city": "Salvatierra",
    "weight": "135.00",
    "height": "1.86",
    "age": 26,
    "experience": 0,
    "is_active": 1,
    "created_at": "2025-03-18 15:01:33",
    "updated_at": "2025-03-18 15:01:33"
  },
  "status": 200,
  "description": "The player was deleted successfully"
}
```
