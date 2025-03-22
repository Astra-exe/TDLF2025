# ✏️ Editar una pareja

```
[PUT] /v1/pairs/@id
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador de la pareja. |

Cuerpo de la petición:

| Campo | Tipo | Requerido | Rango | Descripción |
| ----- | ---- | --------- | ----- | ----------- |
| `is_eliminated` | `boolean` | `false` | `contains: [yes/no, on/off, 1/0, true/false]` | Estatus de eliminación de la pareja. |
| `is_active` | `boolean` | `false` | `contains: [yes/no, on/off, 1/0, true/false]` | Estatus de actividad de la pareja. |

Ejemplo:

```bash
curl -X PUT \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/pairs/@id \
  -d '{
    "is_eliminated": "1"
    "is_active": "0"
  }'
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "a23aa875-d127-483b-9734-9676b93a6ff7",
    "is_eliminated": 1,
    "is_active": 0,
    "created_at": "2025-03-18 14:40:07",
    "updated_at": "2025-03-20 13:37:56",
    "registration_category": {
      "id": "eb69a503-6eb3-4f20-b30b-c9a4762a8cfd",
      "name": "open",
      "description": "Libre"
    }
  },
  "status": 200,
  "description": "The pair was updated successfully"
}
```
