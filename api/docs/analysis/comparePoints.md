# Comparación de puntos

Obtiene una gráfica comparativa de los puntos realizados en las categorías de inscripción.

```
[GET] /v1/analysis/comparisons/points
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/analysis/comparisons/points
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
          "77.0",
          "77.25"
        ],
        "textposition": "auto",
        "type": "bar",
        "x": [
          "Libre",
          "50 y más"
        ],
        "y": [
          77,
          77.25
        ]
      }
    ],
    "title": "Promedio de puntos hechos por categoria",
    "x-axis": "Categoría",
    "y-axis": "Puntos promedio"
  },
  "status": 200,
  "description": "Information about the points comparison"
}
```
