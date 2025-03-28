# 🏷️ / 📋 + ⚖️ Paridad de una categoría de inscripción

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
{
  "data": {
    "data": [
      {
        "marker": {
          "color": "#E61357",
          "cornerradius": 10
        },
        "text": [
          7.85,
          8.79,
          8.12,
          1.73,
          8.04,
          11.09,
          2.52,
          11.8
        ],
        "textposition": "auto",
        "type": "bar",
        "x": [
          "A",
          "B",
          "C",
          "D",
          "E",
          "F",
          "G",
          "H"
        ],
        "y": [
          7.85,
          8.79,
          8.12,
          1.73,
          8.04,
          11.09,
          2.52,
          11.8
        ]
      }
    ],
    "title": "¿Qué tan parejos estuvieron los grupos de la categoria Libre?",
    "x-axis": "Grupos",
    "y-axis": "Indice de paridad"
  },
  "status": 200,
  "description": "Information about the registration category parity"
}
```
