# 👀 Información de un usuario

```
[GET] /v1/users/@id
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del usuario. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/users/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "8a168aa8-02ae-4ccd-96a6-c9b5780a223e",
    "email": "ricardog08@riseup.net",
    "username": "ricardog08",
    "fullname": "Ricardo García Jiménez",
    "is_active": 1,
    "created_at": "2025-03-21 00:42:11",
    "updated_at": "2025-03-21 00:42:11",
    "role": {
      "id": "3d2e95aa-0616-11f0-a401-142b9a82bd2f",
      "name": "judge",
      "description": "Juez"
    }
  },
  "status": 200,
  "description": "Information about the user"
}
```
