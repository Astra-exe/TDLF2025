# ❌ + 👥 Descalificar grupos si todas sus parejas están descalificadas

```
[POST] /v1/rounds/purge
```

Ejemplo:

```bash
curl -X POST \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  http://localhost:8080/v1/rounds/purge/groups
```

Respuesta de la petición:

```json
{
  "data": null,
  "status": 200,
  "description": "The purge groups action was executed successfully"
}
```
