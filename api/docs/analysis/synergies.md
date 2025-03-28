# 🏷️ / 📋 + 👫 + 🏃‍♂️ Sinergia de una categoría de inscripción

Obtiene una gráfica comparativa que describe el desempeño de las parejas.

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
{
  "data": {
    "data": [
      {
        "marker": {
          "color": "#AA12E6",
          "cornerradius": 10
        },
        "text": [
          "-43.33%",
          "-33.33%",
          "26.67%",
          "90.0%",
          "-63.33%",
          "3.33%",
          "36.67%",
          "63.33%",
          "-43.33%",
          "13.33%",
          "13.33%",
          "56.67%",
          "23.33%",
          "-13.33%",
          "-3.33%",
          "33.33%",
          "-40.0%",
          "-13.33%",
          "16.67%",
          "76.67%",
          "-80.0%",
          "10.0%",
          "50.0%",
          "60.0%",
          "-13.33%",
          "13.33%",
          "20.0%",
          "20.0%",
          "-56.67%",
          "0.1%",
          "0.1%",
          "96.67%"
        ],
        "textposition": "auto",
        "type": "bar",
        "x": [
          "Jorge Rios-JR PAREJA DOS",
          "Ulises Medrano-Paul Solorio",
          "José Manuel Vargas-Ernesto Oñate",
          "Gerardo Martínez-Jesús Arguellas",
          "Juan Pablo Bullet-JP Bullet Dos",
          "Francisco Solis-Diego Solis",
          "Edgar Labra-Rodrigo Sánchez",
          "Alonso Calderon-Lennin Bustos",
          "Yonatan Ángeles-Daniel Sánchez Dos",
          "Adrián Arreola-Marcos Rojo",
          "Fabián Padilla-Victor Ayala",
          "Carlos Castro-Owen Alexander",
          "Fernando Córtez-Avimael Tapia",
          "Daniel Adame-Alonso Zuñiga",
          "Santiago Martinez-Fernando Soto",
          "Julio Méndez-Miguel Baez",
          "Raúl Rodriguez-César Rodríguez",
          "Alejandro Padrón-Victor Cardiel",
          "Ricky Rodriguez-Victor Cordero",
          "Enrique Ybarra Lara-Gerardo Cruz Parente",
          "Antonio Daniel Quintana-Diego Alejandro Quintana",
          "Giovanny Venegas-Miguel Cervantes",
          "Daniel Aguilar-Daniel Sánchez",
          "Marco López-Mikjail Juárez",
          "Gustavo Ventura-Luis Zavala Orozco",
          "Nestor de la Rosa-Sebastián Velázquez",
          "Carlos García-Armando Ordónez",
          "David Martínez-Iván Zavala",
          "Manuel Méndez-Eduardo Gutierrez",
          "Lalo Morales-Juan Mireles",
          "Iván Zuñiga-Alejandro Flores",
          "Edgar García-Hugo Eduardo Arizmendi"
        ],
        "y": [
          0,
          0,
          26.67,
          90,
          0,
          3.33,
          36.67,
          63.33,
          0,
          13.33,
          13.33,
          56.67,
          23.33,
          0,
          0,
          33.33,
          0,
          0,
          16.67,
          76.67,
          0,
          10,
          50,
          60,
          0,
          13.33,
          20,
          20,
          0,
          0.1,
          0.1,
          96.67
        ]
      },
      {
        "marker": {
          "color": "#E64912",
          "cornerradius": 10
        },
        "text": [
          "-43.33%",
          "-33.33%",
          "26.67%",
          "90.0%",
          "-63.33%",
          "3.33%",
          "36.67%",
          "63.33%",
          "-43.33%",
          "13.33%",
          "13.33%",
          "56.67%",
          "23.33%",
          "-13.33%",
          "-3.33%",
          "33.33%",
          "-40.0%",
          "-13.33%",
          "16.67%",
          "76.67%",
          "-80.0%",
          "10.0%",
          "50.0%",
          "60.0%",
          "-13.33%",
          "13.33%",
          "20.0%",
          "20.0%",
          "-56.67%",
          "0.1%",
          "0.1%",
          "96.67%"
        ],
        "textposition": "auto",
        "type": "bar",
        "x": [
          "Jorge Rios-JR PAREJA DOS",
          "Ulises Medrano-Paul Solorio",
          "José Manuel Vargas-Ernesto Oñate",
          "Gerardo Martínez-Jesús Arguellas",
          "Juan Pablo Bullet-JP Bullet Dos",
          "Francisco Solis-Diego Solis",
          "Edgar Labra-Rodrigo Sánchez",
          "Alonso Calderon-Lennin Bustos",
          "Yonatan Ángeles-Daniel Sánchez Dos",
          "Adrián Arreola-Marcos Rojo",
          "Fabián Padilla-Victor Ayala",
          "Carlos Castro-Owen Alexander",
          "Fernando Córtez-Avimael Tapia",
          "Daniel Adame-Alonso Zuñiga",
          "Santiago Martinez-Fernando Soto",
          "Julio Méndez-Miguel Baez",
          "Raúl Rodriguez-César Rodríguez",
          "Alejandro Padrón-Victor Cardiel",
          "Ricky Rodriguez-Victor Cordero",
          "Enrique Ybarra Lara-Gerardo Cruz Parente",
          "Antonio Daniel Quintana-Diego Alejandro Quintana",
          "Giovanny Venegas-Miguel Cervantes",
          "Daniel Aguilar-Daniel Sánchez",
          "Marco López-Mikjail Juárez",
          "Gustavo Ventura-Luis Zavala Orozco",
          "Nestor de la Rosa-Sebastián Velázquez",
          "Carlos García-Armando Ordónez",
          "David Martínez-Iván Zavala",
          "Manuel Méndez-Eduardo Gutierrez",
          "Lalo Morales-Juan Mireles",
          "Iván Zuñiga-Alejandro Flores",
          "Edgar García-Hugo Eduardo Arizmendi"
        ],
        "y": [
          -43.33,
          -33.33,
          0,
          0,
          -63.33,
          0,
          0,
          0,
          -43.33,
          0,
          0,
          0,
          0,
          -13.33,
          -3.33,
          0,
          -40,
          -13.33,
          0,
          0,
          -80,
          0,
          0,
          0,
          -13.33,
          0,
          0,
          0,
          -56.67,
          0,
          0,
          0
        ]
      }
    ],
    "title": "Sinergia de los equipos de la categoria Libre",
    "x-axis": "Parejas",
    "y-axis": "Sinergia"
  },
  "status": 200,
  "description": "Information about the registration category synergy"
}
```
