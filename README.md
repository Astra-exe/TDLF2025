<div align="center" id="readme-top">
  <img src="./tdlf2025-app/public/logo.png" alt="Logo TDLF 2025" width="50%">

  <p align="center">
    <b>Torneo de las Fresas 2025</b> es una plataforma integral para gestionar y optimizar el evento deportivo del mismo nombre, proporcionando herramientas para el registro de participantes, seguimiento de partidos y análisis de datos.
    <br />
    <a href="https://medium.com/@juan.ramirez.j99/torneo-de-las-fresas-2025-innovaciones-tecnológicas-e2f4c1a9b8d7"><strong>Innovaciones Tecnológicas en el Torneo de las Fresas 2025 »</strong></a>
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Tabla de Contenidos</summary>
  <ol>
    <li><a href="#sobre-el-proyecto">Sobre el Proyecto</a></li>
    <li><a href="#construido-con">Construido con</a></li>
    <li><a href="#conoce-al-equipo">Conoce al Equipo</a></li>
    <li>
      <a href="#empezando">Empezando</a>
      <ul>
        <li><a href="#prerrequisitos">Prerrequisitos</a></li>
        <li><a href="#instalación">Instalación</a></li>
      </ul>
    </li>
    <li><a href="#uso">Uso</a>
      <ul>
        <li><a href="#pasos">Pasos</a></li>
        <li><a href="#pruebas">Pruebas</a></li>
      </ul>
    </li>
    <li><a href="#consideraciones">Consideraciones</a></li>
  </ol>
</details>

## Sobre el Proyecto

El Torneo de las Fresas 2025 es una plataforma diseñada para facilitar la gestión del evento deportivo, asegurando que todo funcione sin problemas desde el registro y gestions de participantes, la creacion de grupos y partidos, hasta la finalización del torneo. Utiliza algoritmos avanzados para analizar datos y proporcionar estadísticas de rendimiento una vez concluido el evento.

## Construido con

- [![PHP][PHP.js]][PHP-url]
- [![Next.js][Next.js.js]][Next.js-url]
- [![Tailwind CSS][Tailwind.js]][Tailwind-url]
- [![Python][Python.js]][Python-url]
- [![Jupyter][Jupyter.js]][Jupyter-url]
- [![MySQL][MySQL.js]][MySQL-url]

<p align="right">(<a href="#readme-top">volver arriba</a>)</p>

## Conoce al Equipo

- [Francisco Solis](https://github.com/ricardogj08) - Frontend
- [Ricardo Garcia](https://github.com/francisco-solis99) - Backend
- [Juan Ramírez](https://github.com/Astra-exe) - Data Science

<p align="right">(<a href="#readme-top">volver arriba</a>)</p>

## Empezando

### Prerrequisitos

> [!WARNING]
> Considera contar con las variables de entorno necesarias para ejecutar la aplicación. Puedes ver los archivos .env-example en cada directorio de los servicios para saber que valores o secretos hay que setear para su correcto funcionamiento.

Asegúrate de tener PHP, Node.js y Python instalados en tu dispositivo local.

> [Instalar PHP](https://www.php.net/downloads)

> [Instalar Node.js](https://nodejs.org/)

> [Instalar Python](https://www.python.org/downloads/)

### Instalación

1. Clona el repositorio `git clone https://github.com/Astra-exe/TDLF2025.git`
2. Muevete al directorio `cd TDLF2025`
3. Muevete al directorio `cd da`
4. Instala los paquetes de Python `pip install -r requirements.txt`
5. Muevete al directorio `cd api`
6. Instala php, sus paquetes necesarios y la base de datos ya con migraciones para la aplicación `composer`
7. Muevete al directorio `tdlf2025-app`
8. Para la aplicacion de NextJs, instala los paquetes de Node.js `pnpm install` o `npm install`
9. Ejecuta la aplicación `pnpm run dev` o `npm run dev`

O Instala Docker para correr los servicios de php y python:

> [Instalar Docker](https://www.docker.com/)

1. Construye el contenedor de python en el directorio `da` con el comando `docker build -t tdlf-python`
2. Corre el contenedor de python con `docker run -d -p 8000:80 --name tdlf-data tdlf-python`
3. Construye el contenedor de php en el directorio `api` con el comando `docker build -t TDLF2025/api -f Dockerfile.dev ./`
4. Corre el contenedor de php con `docker run --name TDLF2025-api --env-file .env -p 8080:80 TDLF2025/api`
5. Para la aplicacion de NextJs, instala los paquetes de Node.js `pnpm install` o `npm install`
6. Ejecuta la aplicación `pnpm run dev` o `npm run dev`

<p align="right">(<a href="#readme-top">volver arriba</a>)</p>

## Uso

### Pasos

> [!NOTE]
> Asegurate que los servicios esten corriendo en su puerto especificado y si hay problemas cambia el servicio de puerto.
> Puedes crear un usuario con algún password para poder ingresarlo desde la base de datos o desde algún seeder en el backend
> Considera preprocesar en los diferentes Jupiter Notebooks del directorio `/da/notebooks`

1. Inicia la aplicacion de NextJs en local, por defecto esta en el puerto 3000. Visita `http://localhost:3000/` para ver la landing del evento:
2. Visita la ruta `http://localhost:3000/login` para loguearte.
3. En el home dashboard podras ver algunos datos generales del torneo, como el numero de participantes, parejas, grupos, categorias, etc del torneo.
4. Visita la ruta `http://localhost:3000/dashboard/inscripcion` para crear nuevos juadores del torneo.
5. Puedes consultar el perfil de cada uno de los jugadores con algunos consejos para la competencia dando clic en sus nombres.
6. Visita la ruta `http://localhost:3000/dashboard/parejas` para visualizar las parejas creadas o crear alguna nueva de los jugadores previamente inscritos.
7. Una vez lista la tabla de parejas visita la ruta `http://localhost:3000/dashboard/grupos` para crear de manera aleatoria los grupos a los que perteneceran cada pareja y los partidos a llevarse a cabo en cada categoria.
8. Dentro de esa misma ruta `http://localhost:3000/dashboard/grupos` podras acceder a los grupos de cada categoria para verlos.
9. Visita `http://localhost:3000/dashboard/partidos` podras ver la tabla de partidos de cada categoria y modificar el score o las parejas del partido.
10. Una vez creados los partidos y grupos, puedes ver la tabla de parejas en `http://localhost:3000/parejas`
11. De igual forma puedes ver los partidos de cada grupo `http://localhost:3000/grupos/idCategory/idGroup` y la tabla de clasificación. Esta tabla cambia conforme se den los partidos.
12. Cuando el torneo o los datos de los partidos esten capturados se podran ver las estadisticas generales del evento en `http://localhost:3000/estadisticas`
13. Podras visitar estadisticas especificas de cada categoria como puntos hechos vs puntos recibidos, la sinergia de las parejas y la paridad de grupos desde `http://localhost:3000/estadisticas/idCategory`
14. De igual forma visita `http://localhost:3000/emociones` para ver el analisis general de sentimientos realizado con machine learning.

### Pruebas

- Puedes probar el sistema con tus propios datos en el entorno local.
- También puedes ver los resultados de la herramienta en: <a href="https://tdlf2025.vercel.app/">Torneo de las Fresas 2025</a>

<p align="right">(<a href="#readme-top">volver arriba</a>)</p>

## Consideraciones

- Asegúrate de que tus datos de entrada estén correctamente formateados.
- El sistema puede requerir ajustes dependiendo de los datos específicos que utilices.
- Para las estadisticas post-torneo cabe recalcar que fueron procesadas fuera del servicio de python en un Jupyter Notebook en la nube para evitar sobrecargar el servidor usado.
- Por el momento el sistema solo abarca hasta la fase de grupos, sin contar la fase de eliminación directa

<p align="right">(<a href="#readme-top">volver arriba</a>)</p>

## Evento

<!-- intro del evento -->

### Alcance

<!-- Aforo -->

### Adversidades y obstaculos

<!-- problemas y soluciones -->

### Criticas y areas de mejora

<!-- comentarios recibidos y autocritica -->

<div align="center">
  <h3 align="center">¡Gracias por visitar! 🏆</h3>
</div>

[PHP.js]: https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white
[PHP-url]: https://www.php.net/
[Next.js.js]: https://img.shields.io/badge/Next.js-000000?style=for-the-badge&logo=next.js&logoColor=white
[Next.js-url]: https://nextjs.org/
[Tailwind.js]: https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white
[Tailwind-url]: https://tailwindcss.com/
[Python.js]: https://img.shields.io/badge/Python-3776AB?style=for-the-badge&logo=python&logoColor=white
[Python-url]: https://www.python.org/
[Jupyter.js]: https://img.shields.io/badge/Jupyter-F37626?style=for-the-badge&logo=jupyter&logoColor=white
[Jupyter-url]: https://jupyter.org/
[MySQL.js]: https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white
[MySQL-url]: https://www.mysql.com/
