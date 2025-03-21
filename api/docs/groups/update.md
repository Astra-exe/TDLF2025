# Modificar un grupo

```
[PUT] /v1/groups/@id
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del grupo. |

Cuerpo de la petición:

| Campo | Tipo | Requerido | Rango | Descripción |
| ----- | ---- | --------- | ----- | ----------- |
| `is_eliminated` | `boolean` | `false` | `contains: [yes/no, on/off, 1/0, true/false]` | Estatus de eliminación del grupo. |
| `is_active` | `boolean` | `false` | `contains: [yes/no, on/off, 1/0, true/false]` | Estatus de actividad del grupo. |

Ejemplo:

```bash
curl -X PUT \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/groups/@id \
  -d '{
    "is_eliminated": "1"
    "is_active": "0"
  }'
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
    "name": "A_2025",
    "description": "A",
    "is_eliminated": 1,
    "is_active": 0,
    "created_at": "2025-03-20 21:27:39",
    "updated_at": "2025-03-20 23:52:29",
    "registration_category": {
      "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
      "name": "open",
      "description": "Libre"
    }
  },
  "status": 200,
  "description": "The group was updated successfully"
}
```
