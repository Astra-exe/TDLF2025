# 🏷️ / 📋 + 👫 Comparación de sinergias

Obtiene una gráfica comparativa de las sinergias de las categorías de inscripción.

```
[GET] /v1/analysis/comparisons/synergies
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/analysis/comparisons/synergies
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
          "10.0069",
          "9.9994"
        ],
        "textposition": "auto",
        "type": "bar",
        "x": [
          "Libre",
          "50 y más"
        ],
        "y": [
          10.0069,
          9.9994
        ]
      }
    ],
    "title": "Comparativa de sinergia entre categorias",
    "x-axis": "Categoría",
    "y-axis": "Sinergia"
  },
  "status": 200,
  "description": "Information about the synergies comparison"
}
```
