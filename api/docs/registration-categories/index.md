# Categorías de inscripción

Categorías de inscripción de las parejas.

```
[GET] /v1/categories/registrations
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  http://localhost:8080/v1/categories/registrations
```

Respuesta de la petición:

```json
{
    "data": [
        {
            "id": "59b675bb-4559-4748-8974-0753e716e8af",
            "name": "open",
            "description": "Categoría libre",
            "created_at": "2025-02-19 08:09:02",
            "updated_at": "2025-02-19 08:09:02"
        },
        {
            "id": "ec2eeabb-3541-4151-9b01-f2876c74151c",
            "name": "seniors",
            "description": "Categoría para 50 y más",
            "created_at": "2025-02-19 08:09:02",
            "updated_at": "2025-02-19 08:09:02"
        }
    ],
    "status": 200,
    "description": "Information about all the categories of pairs players registration"
}
```
