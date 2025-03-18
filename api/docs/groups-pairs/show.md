# Parejas de un grupo

```
[GET] /v1/groups/@id/pairs
```

 Ejemplo:

 ```bash
 curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/groups/@id/pairs
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "pair": {
        "id": "5dfbfd5c-26e2-4dbe-8bd6-1040a6cf1e10",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-17 23:51:47",
        "updated_at": "2025-03-17 23:51:47",
        "registration_category": {
          "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
          "name": "open",
          "description": "Libre"
        }
      },
      "relationship": {
        "id": "48142ac1-f2da-485e-af15-1fcd386b34d6",
        "pair_id": "5dfbfd5c-26e2-4dbe-8bd6-1040a6cf1e10",
        "group_id": "19dcf711-ac20-4be5-8bc9-daa27582c6c2",
        "created_at": "2025-03-18 01:21:28",
        "updated_at": "2025-03-18 01:21:28"
      }
    },
    {
      "pair": {
        "id": "6b8689f2-d90b-44f5-b5c2-1caa9bccc71e",
        "is_eliminated": 0,
        "is_active": 1,
        "created_at": "2025-03-17 23:51:48",
        "updated_at": "2025-03-17 23:51:48",
        "registration_category": {
          "id": "4291ffa3-0b5c-4c3c-bd29-31cfddb130be",
          "name": "open",
          "description": "Libre"
        }
      },
      "relationship": {
        "id": "4f3c6b42-9a1e-4ab5-9fcd-a42691388086",
        "pair_id": "6b8689f2-d90b-44f5-b5c2-1caa9bccc71e",
        "group_id": "19dcf711-ac20-4be5-8bc9-daa27582c6c2",
        "created_at": "2025-03-18 01:21:28",
        "updated_at": "2025-03-18 01:21:28"
      }
    },
    ...
  ],
  "status": 200,
  "description": "Information about the group pairs"
}
```
