# ➕ Crear un usuario

```
[POST] /v1/users
```

Cuerpo de la petición:

| Campo | Tipo | Requerido | Rango | Descripción |
| ----- | ---- | --------- | ----- | ----------- |
| `fullname` | `string` | `true` | `between_len: [1, 128]` | Nombre completo del usuario. |
| `email` | `string` | `true` | `between_len: [1, 128]` | Email del usuario. |
| `username` | `string` | `true` | `between_len: [1, 64]` | Apodo del usuario. |
| `role_id` | `string` | `true` | `exact_len: 36` | Identificador del rol del usuario ([ver](../roles/index.html)). |

Ejemplo:

```bash
curl -X POST \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/users \
  -d '{
    "fullname": "Ricardo García Jiménez",
    "email": "ricardog08@riseup.net",
    "username": "ricardog08",
    "role_id": "3d2e95aa-0616-11f0-a401-142b9a82bd2f"
  }'
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
