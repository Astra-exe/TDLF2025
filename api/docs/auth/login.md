# 🪪 Inicio de sesión

```
[POST] /v1/auth/login
```

Cuerpo de la petición:

| Campo | Tipo | Requerido | Rango | Descripción |
| ----- | ---- | --------- | ----- | ----------- |
| `nickname` | `string` | `true` | `between_len: [1, 128]` | Nombre de usuario o correo eléctrico del usuario de acceso. |
| `password` | `string` | `true` | `between_len: [8, 64]` | Contraseña del usuario de acceso. |

Ejemplos:

```bash
curl -X POST \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  http://localhost:8080/v1/auth/login \
  -d '{
    "nickname": "ricardogj08",
    "password": "12345678"
  }'

curl -X POST \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  http://localhost:8080/v1/auth/login \
  -d '{
    "nickname": "ricardogj08@riseup.net",
    "password": "12345678"
  }'
```

Respuesta de la petición:

```json
{
  "data": {
    "api_key": "516220f0beed3bb91d711932f280123a62246183e67bf2d4f434f7f913770b88"
  },
  "status": 201,
  "description": "The API key was created successfully"
}
```
