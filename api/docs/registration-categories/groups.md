# 👥 Grupos de una categoría de inscripción

```
[GET] /v1/categories/registrations/@id/groups
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador de la categoría de inscripción. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/categories/registrations/@id/groups
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "3a8b9ca2-09e6-47b8-8c8b-edbf506bd8fe",
      "registration_category_id": "c98fb1f7-837b-4301-947f-8367f6fb29b8",
      "name": "A_2025",
      "description": "A",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-17 16:07:14",
      "updated_at": "2025-03-17 16:07:14"
    },
    {
      "id": "85544ec6-4021-4ebe-9eff-2569ae9e02d2",
      "registration_category_id": "c98fb1f7-837b-4301-947f-8367f6fb29b8",
      "name": "B_2025",
      "description": "B",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-17 16:07:14",
      "updated_at": "2025-03-17 16:07:14"
    },
    ...
  ],
  "status": 200,
  "description": "Information about the registration category groups"
}
```
