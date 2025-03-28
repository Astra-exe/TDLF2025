# 👥 + 🎾 Puntos de un grupo

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
{
  "data": {
    "data": [
      {
        "marker": {
          "color": "#3C9145",
          "cornerradius": 10
        },
        "text": [
          14,
          14,
          23,
          30
        ],
        "textposition": "auto",
        "type": "bar",
        "x": [
          "Jorge Rios-JR PAREJA DOS",
          "Ulises Medrano-Paul Solorio",
          "José Manuel Vargas-Ernesto Oñate",
          "Gerardo Martínez-Jesús Arguellas"
        ],
        "y": [
          14,
          14,
          23,
          30
        ]
      },
      {
        "marker": {
          "color": "#E61357",
          "cornerradius": 10
        },
        "text": [
          30,
          27,
          18,
          6
        ],
        "textposition": "auto",
        "type": "bar",
        "x": [
          "Jorge Rios-JR PAREJA DOS",
          "Ulises Medrano-Paul Solorio",
          "José Manuel Vargas-Ernesto Oñate",
          "Gerardo Martínez-Jesús Arguellas"
        ],
        "y": [
          30,
          27,
          18,
          6
        ]
      }
    ],
    "title": "Puntos hechos vs puntos recibidos del grupo A",
    "x-axis": "Jugadores",
    "y-axis": "Puntos"
  },
  "status": 200,
  "description": "Information about the group points"
}
```
