# Renovar API key

```
[POST] /v1/auth/refresh
```

Ejemplo:

```bash
curl -X POST \
  -H 'Content-Type: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/auth/refresh
```

Respuesta de la petición:

```json
{
  "data": {
    "api_key": "f74857b229d61d810ac5ab3aa4c4d2010f2ea6028a69533f8d76a5e2429d8df1"
  },
  "status": 201,
  "description": "The API key was renewed successfully"
}
```
