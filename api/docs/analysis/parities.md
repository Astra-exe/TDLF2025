# Paridad de una categoría de inscripción

Obtiene una gráfica comparativa que describe el emparejamiento de los partidos en una categoría de inscripción.

```
[GET] /v1/analysis/parities/@id
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador de la categoría de inscripción. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/analysis/parities/@id
```

Respuesta de la petición:

```json
```
