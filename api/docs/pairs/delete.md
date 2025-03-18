# Eliminar una pareja

```
[DELETE] /v1/pairs/@id
```

> La pareja no debe contener información asociada a grupos y partidos.

Parámetros de la petición:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador de la pareja. |

Ejemplo:

```bash
curl -X DELETE \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/pairs/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "040f0b81-9467-48f6-8f35-c2c72c90fd67",
    "is_eliminated": 0,
    "is_active": 1,
    "created_at": "2025-03-18 14:42:47",
    "updated_at": "2025-03-18 14:42:47",
    "registration_category": {
      "id": "76d95a95-0fa3-4d58-a8ce-031a1db25b3c",
      "name": "open",
      "description": "Libre"
    }
  },
  "status": 200,
  "description": "The pair was deleted successfully"
}
```
