# Asignar grupos, parejas y partidos de manera aleatoria

```
[POST] /v1/randomize/groups/pairs/matches
```

> Realiza la acción una única vez para las [categorías de registro](../registration-categories/index.html) que no contengan grupos asignados.

Ejemplo:

```bash
curl -X POST \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  http://localhost:8080/v1/randomize/groups/pairs/matches
```

Respuesta de la petición:

```json
{
  "data": null,
  "status": 200,
  "description": "The action that randomly sets groups, pairs and matches was executed successfully"
}
```
