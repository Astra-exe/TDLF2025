# Grupos de una categoría de inscripción

```
[GET] /v1/categories/registrations/@id/groups
```

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
      "name": "A_2025",
      "description": "A",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-17 16:07:14",
      "updated_at": "2025-03-17 16:07:14",
      "registration_category": {
        "id": "c98fb1f7-837b-4301-947f-8367f6fb29b8",
        "name": "open",
        "description": "Libre"
      }
    },
    {
      "id": "85544ec6-4021-4ebe-9eff-2569ae9e02d2",
      "name": "B_2025",
      "description": "B",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-17 16:07:14",
      "updated_at": "2025-03-17 16:07:14",
      "registration_category": {
        "id": "c98fb1f7-837b-4301-947f-8367f6fb29b8",
        "name": "open",
        "description": "Libre"
      }
    },
    {
      "id": "b72294f3-7155-4749-abb4-e820369ebc26",
      "name": "C_2025",
      "description": "C",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-17 16:07:14",
      "updated_at": "2025-03-17 16:07:14",
      "registration_category": {
        "id": "c98fb1f7-837b-4301-947f-8367f6fb29b8",
        "name": "open",
        "description": "Libre"
      }
    },
    {
      "id": "8cb2c28b-cb7b-4435-8350-ad3e20fb44c4",
      "name": "D_2025",
      "description": "D",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-17 16:07:14",
      "updated_at": "2025-03-17 16:07:14",
      "registration_category": {
        "id": "c98fb1f7-837b-4301-947f-8367f6fb29b8",
        "name": "open",
        "description": "Libre"
      }
    },
    {
      "id": "2faa75eb-2b40-4e2b-b513-c030f9ea7fca",
      "name": "E_2025",
      "description": "E",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-17 16:07:14",
      "updated_at": "2025-03-17 16:07:14",
      "registration_category": {
        "id": "c98fb1f7-837b-4301-947f-8367f6fb29b8",
        "name": "open",
        "description": "Libre"
      }
    },
    {
      "id": "597e7d22-44c1-4a0e-bd4f-93687dddb788",
      "name": "F_2025",
      "description": "F",
      "is_eliminated": 0,
      "is_active": 1,
      "created_at": "2025-03-17 16:07:14",
      "updated_at": "2025-03-17 16:07:14",
      "registration_category": {
        "id": "c98fb1f7-837b-4301-947f-8367f6fb29b8",
        "name": "open",
        "description": "Libre"
      }
    }
  ],
  "status": 200,
  "description": "Information about the groups of the registration category of pairs players"
}
```
