# Puntos de un grupo

Obtiene una gráfica que compara los puntos realizados en un grupo.

```
[GET] /v1/analysis/groups/@id/points
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del grupo. |

Ejemplo:

```bash
 curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/groups/@id/points
```

Respuesta de la petición:

```json
```
