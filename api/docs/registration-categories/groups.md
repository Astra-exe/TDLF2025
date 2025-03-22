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
      "id": "fb983148-d4f6-41c3-8fb5-bda2146f7fa6",
      "name": "A_2025",
      "description": "A",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-20 21:27:39",
      "updated_at": "2025-03-20 23:52:50",
      "registration_category": {
        "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
        "name": "open",
        "description": "Libre"
      }
    },
    {
      "id": "7836e4bf-c98f-4389-b29c-f771b005ec2c",
      "name": "B_2025",
      "description": "B",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-20 21:27:39",
      "updated_at": "2025-03-20 21:27:39",
      "registration_category": {
        "id": "5d840f53-ffb0-427c-8554-bfff885d6b6a",
        "name": "open",
        "description": "Libre"
      }
    },
    ...
  ],
  "status": 200,
  "description": "Information about the registration category groups"
}
```
