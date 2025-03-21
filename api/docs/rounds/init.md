# 🎲 Asignar grupos, parejas y partidos

```
[POST] /v1/rounds/init
```

> Realiza la acción una única vez para las [categorías de inscripción](../registration-categories/index.html) que no contengan grupos asignados.

Ejemplo:

```bash
curl -X POST \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  http://localhost:8080/v1/rounds/init
```

Respuesta de la petición:

```json
{
  "data": null,
  "status": 200,
  "description": "The round init action was executed successfully"
}
```
