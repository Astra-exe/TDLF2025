# Documentación de la API de Análisis de Datos

API construida con Flask que provee varios endpoints para generar perfiles de jugadores, mapas, gráficos de paridad, puntos y sinergia, y comparativas entre categorías. La aplicación consume datos de la API en php del torneo y los procesa de forma local. Utiliza funciones importadas desde `utils.features` para procesar y graficar los datos.

---

## Índice

- [Documentación de la API de Análisis de Datos](#documentación-de-la-api-de-análisis-de-datos)
  - [Índice](#índice)
  - [Requisitos](#requisitos)
  - [Configuración del Entorno](#configuración-del-entorno)
  - [Estructura del Proyecto](#estructura-del-proyecto)
  - [Endpoints](#endpoints)
    - [GET `/`](#get-)
    - [GET `/profile/<player_id>`](#get-profileplayer_id)
    - [GET `/map`](#get-map)
    - [GET `/parity/<cathegory_id>`](#get-paritycathegory_id)
    - [GET `/points/<cathegory_id>/<group>`](#get-pointscathegory_idgroup)
    - [GET `/sinergy/<cathegory_id>`](#get-sinergycathegory_id)
    - [GET `/sinergy_compare`](#get-sinergy_compare)
    - [GET `/points_compare`](#get-points_compare)
    - [GET `/feelings`](#get-feelings)
  - [Manejo de Errores](#manejo-de-errores)
  - [Ejecución](#ejecución)
  - [Notas Adicionales](#notas-adicionales)

---

## Requisitos

- **Python 3.11+**
- **Flask** y **Flask-CORS**
- **Requests**
- **Pandas**
- **Numpy**
- **Plotly** (a través de las funciones importadas desde `utils.features`)
- **python-dotenv** para cargar variables de entorno

---

## Configuración del Entorno

La aplicación utiliza variables de entorno definidas en un archivo `.env`. Asegúrate de tener configuradas las siguientes variables:

- `API_NICKNAME`: Nickname para autenticación.
- `API_PASSWORD`: Contraseña para autenticación.
- `CATHEGORY_SENIORS_ID`: Identificador de la categoría para seniors.
- `CATHEGORY_OPEN_ID`: Identificador de la categoría para la categoría abierta.

Estas variables se cargan al inicio de la aplicación mediante el paquete `dotenv`:

```python
from dotenv import load_dotenv
load_dotenv()
```

---

## Estructura del Proyecto

```
.
├── app.py                 # Archivo principal (el código mostrado)
├── .env                   # Archivo de configuración de variables de entorno
├── templates/
│   └── welcome.html       # Plantilla para la ruta de inicio
├── players_location.json  # Archivo JSON con la ubicación de los jugadores
├── parity_seniors.json    # Archivo JSON con datos de paridad para seniors
├── parity_open.json       # Archivo JSON con datos de paridad para categoría abierta
├── data_matches_seniors.csv   # Archivo CSV con datos de partidos de seniors
├── data_matches_open.csv      # Archivo CSV con datos de partidos de categoría abierta
└── utils/
    └── features.py        # Funciones de procesamiento y generación de gráficos
```

---

## Endpoints

### GET `/`
- **Descripción:** Renderiza la plantilla `welcome.html`.
- **Método:** `GET`
- **Salida:** Página HTML.

**Ejemplo de uso:**
```sh
curl -X GET http://localhost:3000/
```

### GET `/profile/<player_id>`
- **Descripción:** Obtiene datos del jugador usando el `player_id` y genera un perfil.
- **Parámetros URL:** `player_id`.
- **Método:** `GET`
- **Salida:** Respuesta JSON con el perfil generado o mensaje de error.

**Ejemplo de uso:**
```sh
curl -X GET http://localhost:3000/profile/eeaaa56a564aa
```

### GET `/map`
- **Descripción:** Genera un mapa de ubicación de los jugadores.
- **Método:** `GET`
- **Salida:** Respuesta JSON con el HTML del mapa.

**Ejemplo de uso:**
```sh
curl -X GET http://localhost:3000/map
```

### GET `/parity/<cathegory_id>`
- **Descripción:** Genera un gráfico de paridad basado en la categoría.
- **Parámetros URL:** `cathegory_id`.
- **Método:** `GET`
- **Salida:** Respuesta JSON con los datos del gráfico.

**Ejemplo de uso:**
```sh
curl -X GET http://localhost:3000/parity/aacace26-65b6-4ac9-8e7c-fcb32061c3fd
```

### GET `/points/<cathegory_id>/<group>`
- **Descripción:** Genera un gráfico de puntos basado en la categoría y grupo.
- **Parámetros URL:** `cathegory_id`, `group`.
- **Método:** `GET`
- **Salida:** Respuesta JSON con datos del gráfico.

**Ejemplo de uso:**
```sh
curl -X GET http://localhost:3000/points/aacace26-65b6-4ac9-8e7c-fcb32061c3fd/A
```

### GET `/sinergy/<cathegory_id>`
- **Descripción:** Genera un gráfico de sinergia basado en la categoría.
- **Parámetros URL:** `cathegory_id`.
- **Método:** `GET`
- **Salida:** Respuesta JSON con datos del gráfico.

**Ejemplo de uso:**
```sh
curl -X GET http://localhost:3000/sinergy/aacace26-65b6-4ac9-8e7c-fcb32061c3fd
```

### GET `/sinergy_compare`
- **Descripción:** Genera una comparativa de sinergia entre categorías.
- **Método:** `GET`
- **Salida:** Respuesta JSON con datos del gráfico.

**Ejemplo de uso:**
```sh
curl -X GET http://localhost:3000/sinergy_compare
```

### GET `/points_compare`
- **Descripción:** Genera una comparativa de puntos entre categorías.
- **Método:** `GET`
- **Salida:** Respuesta JSON con datos del gráfico.

### GET `/feelings`
- **Descripción:** Obtiene un análisis en formato markdown.
- **Método:** `GET`
- **Salida:** Respuesta JSON con el análisis textual en formato markdown.

**Ejemplo de uso:**
```sh
curl -X GET http://localhost:3000/feelings
```

**Ejemplo de respuesta:**
```json
{
  "analysis": "# Análisis de Sentimientos\n\nEste es un ejemplo de texto en markdown con insights sobre los datos.\n\n- Punto 1: Observación relevante.\n- Punto 2: Otra observación importante."
}
```


**Ejemplo de uso:**
```sh
curl -X GET http://localhost:3000/points_compare
```

---

## Manejo de Errores

- **HTTPError:** Se manejan errores HTTP al consumir la API externa.
- **FileNotFoundError:** Se devuelve un error 404 si falta algún archivo JSON o CSV.
- **Errores de conexión:** Se capturan excepciones de conexión y tiempos de espera.
- **Errores genéricos:** Se capturan con un código 500.

---

## Ejecución

1. Instala las dependencias:
   ```bash
   pip install -r requirements.txt
   ```
2. Configura el archivo `.env` con las variables de entorno necesarias.
3. Ejecuta la aplicación:
   ```bash
   python app.py
   ```

La aplicación se ejecutará en el puerto `3000` en modo `debug`.

---

## Notas Adicionales

- Las funciones para generar gráficos y procesar datos se importan desde `utils.features`.
- Los archivos `.csv` y `.json` deben estar en la raíz del proyecto.
- La autenticación a la API externa se realiza mediante `get_apikey()` con las credenciales del `.env`.
