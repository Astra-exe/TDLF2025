# Sinergia de una categoría de inscripción

Obtiene una gráfica comparativa que describe el desempeño de juego de las parejas.

```
[GET] /v1/analysis/synergies/@id
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
  http://localhost:8080/v1/analysis/synergies/@id
```

Respuesta de la petición:

```json
```
