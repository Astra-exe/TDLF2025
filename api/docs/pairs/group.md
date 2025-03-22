# 👥 Grupo de una pareja

```
[GET] /v1/pairs/@id/groups
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador de la pareja. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/pairs/@id/groups
```

Respuesta de la petición:

```json
{
  "data": {
    "group": {
      "id": "5a478de5-5be1-482f-8d44-b98a79d1552c",
      "name": "A_2025",
      "description": "A",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-18 14:41:31",
      "updated_at": "2025-03-18 14:41:31",
      "registration_category": {
        "id": "eb69a503-6eb3-4f20-b30b-c9a4762a8cfd",
        "name": "seniors",
        "description": "50 y más"
      }
    },
    "relationship": {
      "id": "d573b626-36e1-46fc-90ab-3adb51f0acb6",
      "pair_id": "087a1273-19c8-4ccf-8751-b2db6811f1cc",
      "group_id": "5a478de5-5be1-482f-8d44-b98a79d1552c",
      "created_at": "2025-03-18 14:41:31",
      "updated_at": "2025-03-18 14:41:31"
    }
  },
  "status": 200,
  "description": "Information about the pair group"
}
```
