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

El Torneo de las Fresas 2025 es una plataforma diseñada para facilitar la gestión del evento deportivo, asegurando que todo funcione sin problemas desde el registro y gestión de participantes, la creación de grupos y partidos, hasta la finalización del torneo. Utiliza algoritmos avanzados para analizar datos y proporcionar estadísticas de rendimiento una vez concluido el evento.

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
2. Muévete al directorio `cd TDLF2025`
3. Muévete al directorio `cd da`
4. Instala los paquetes de Python `pip install -r requirements.txt`
5. Muévete al directorio `cd api`
6. Instala php, sus paquetes necesarios y la base de datos ya con migraciones para la aplicación `composer install`
7. Muévete al directorio `tdlf2025-app`
8. Para la aplicación de NextJs, instala los paquetes de Node.js `pnpm install` o `npm install`
9. Ejecuta la aplicación `pnpm run dev` o `npm run dev`

O Instala Docker para correr los servicios de php y python:

> [Instalar Docker](https://www.docker.com/)

1. Construye el contenedor de python en el directorio `da` con el comando `docker build -t tdlf-python`
2. Corre el contenedor de python con `docker run -d -p 8000:80 --name tdlf-data tdlf-python`
3. Construye el contenedor de php en el directorio `api` con el comando `docker build -t TDLF2025/api -f Dockerfile.dev ./`
4. Corre el contenedor de php con `docker run --name TDLF2025-api --env-file .env -p 8080:80 TDLF2025/api`
5. Para la aplicación de NextJs, instala los paquetes de Node.js `pnpm install` o `npm install`
6. Ejecuta la aplicación `pnpm run dev` o `npm run dev`

<p align="right">(<a href="#readme-top">volver arriba</a>)</p>

## Uso

### Pasos

> [!NOTE]
> Asegúrate que los servicios estén corriendo en su puerto especificado y si hay problemas cambia el puerto del servicio.
> Puedes crear un usuario con algún password para poder ingresarlo desde la base de datos o desde algún seeder en el backend.
> Considera preprocesar en los diferentes Jupiter Notebooks del directorio `/da/notebooks`

1. Inicia la aplicacion de NextJs en local, por defecto esta en el puerto 3000. Visita `http://localhost:3000/` para ver la landing del evento:
   ![landing](https://github.com/user-attachments/assets/26b761f7-ac60-4267-aa8c-e5f29aba6a0b)
   ![landing2](https://github.com/user-attachments/assets/1d943616-9243-4870-a06d-fbd3e822ef9f)
   ![landing3](https://github.com/user-attachments/assets/3ec10eeb-49a0-4453-bb1d-fa88a126b102)
2. Visita la ruta `http://localhost:3000/login` para loguearte.
   ![login](https://github.com/user-attachments/assets/49773e39-8f79-4291-9050-14f442597398)
3. En el home dashboard podrás ver algunos datos generales del torneo, como el numero de participantes, parejas, grupos, categorías, etc del torneo.
   ![dashboard](https://github.com/user-attachments/assets/0bf9d90b-7601-4693-822a-758d554313f8)
4. Visita la ruta `http://localhost:3000/dashboard/inscripcion` para crear nuevos jugadores del torneo.
   ![inscripcion](https://github.com/user-attachments/assets/b62a4a15-ea14-4cb5-9b55-f34d2458e1f5)
   ![players](https://github.com/user-attachments/assets/8b334341-5df8-4ec8-895f-f46bcb816c2e)
5. Puedes consultar el perfil de cada uno de los jugadores con algunos consejos para la competencia dando clic en sus nombres.
   ![profile](https://github.com/user-attachments/assets/7d138c37-c2f0-4e9c-80c2-b6c8481baea9)
6. Visita la ruta `http://localhost:3000/dashboard/parejas` para visualizar las parejas creadas o crear alguna nueva de los jugadores previamente inscritos.
   ![pairs](https://github.com/user-attachments/assets/84f5f89f-a6e3-4ed7-b607-795a2faca1da)
   ![create-pairs](https://github.com/user-attachments/assets/650ba25b-62ad-42dd-8d4a-d045ef8625fd)
7. Una vez lista la tabla de parejas visita la ruta `http://localhost:3000/dashboard/grupos` para crear de manera aleatoria los grupos a los que pertenecerán cada pareja y los partidos a llevarse a cabo en cada categoría.
   ![groups](https://github.com/user-attachments/assets/30e3d80b-25f9-4cbe-a9f8-5f434313ad35)
8. Dentro de esa misma ruta `http://localhost:3000/dashboard/grupos` podrás acceder a los grupos de cada categoría para verlos.
   ![group-sebior](https://github.com/user-attachments/assets/03d2e2e1-c5f7-4bc1-8604-cc888828c3a2)
   ![group-open](https://github.com/user-attachments/assets/e3413416-af57-439c-8f19-ab193f29e96d)
9. Visita `http://localhost:3000/dashboard/partidos` podrás ver la tabla de partidos de cada categoría y modificar el score o las parejas del partido.
   ![matches](https://github.com/user-attachments/assets/71e87f5e-bc27-4bc3-90a5-15f761fccf69)
   ![match-update](https://github.com/user-attachments/assets/e84bf55f-c362-4405-b30d-77aed38422cb)
   ![match-delete](https://github.com/user-attachments/assets/daa064d8-e41f-4112-baec-5d185b7a6e03)
10. Una vez creados los partidos y grupos, puedes ver la tabla de parejas en `http://localhost:3000/parejas`
11. De igual forma puedes ver los partidos de cada grupo `http://localhost:3000/grupos/idCategory/idGroup` y la tabla de clasificación. Esta tabla cambia conforme se den los partidos.
    ![matches-group](https://github.com/user-attachments/assets/be0da39a-5078-4c56-a09e-9502882d0c26)
    ![matches-classify](https://github.com/user-attachments/assets/51652a42-8de4-48b0-83ea-d2f69a8b12e2)
12. Cuando el torneo o los datos de los partidos estén capturados se podrán ver las estadísticas generales del evento en `http://localhost:3000/estadisticas`
    ![map](https://github.com/user-attachments/assets/ec56856e-0705-4802-b546-67b58ad9d69c)
13. Podrás visitar estadísticas especificas de cada categoría como puntos hechos vs puntos recibidos, la sinergia de las parejas y la paridad de grupos desde `http://localhost:3000/estadisticas/idCategory`
    ![stats](https://github.com/user-attachments/assets/69d323e2-207a-4e67-b009-fd2f54a35bd0)
14. De igual forma visita `http://localhost:3000/emociones` para ver el análisis general de sentimientos realizado con machine learning.
    ![emotions](https://github.com/user-attachments/assets/45916a8f-acdf-4b56-b6fa-b854bcca8ec5)

### Pruebas

- Puedes probar el sistema con tus propios datos en el entorno local.
- También puedes ver los resultados de la herramienta en: <a href="https://tdlf2025.vercel.app/">Torneo de las Fresas 2025</a>

<p align="right">(<a href="#readme-top">volver arriba</a>)</p>

## Consideraciones

- Asegúrate de que tus datos de entrada estén correctamente formateados.
- El sistema puede requerir ajustes dependiendo de los datos específicos que utilices.
- Para las estadísticas post-torneo cabe recalcar que fueron procesadas fuera del servicio de python en un Jupyter Notebook en la nube para evitar sobrecargar el servidor usado.
- Por el momento el sistema solo abarca hasta la fase de grupos, sin contar la fase de eliminación directa

<p align="right">(<a href="#readme-top">volver arriba</a>)</p>

## Evento

<!-- intro del evento -->

El Torneo de las Fresas 2025, celebrado en la vibrante ciudad de Irapuato, Guanajuato, México, el 23 de marzo de 2025, se consolidó como el evento de frontenis más grande y destacado del Bajío. Este torneo no solo atrajo a participantes y espectadores de toda la región central de México, sino que también se convirtió en un referente de organización y eficiencia gracias al sistema desarrollado específicamente para la ocasión.

Con todas las amenidades necesarias para los jugadores, el evento se desarrolló sin contratiempos, permitiendo una experiencia fluida y agradable para todos los asistentes. El sistema implementado fue el pilar fundamental del torneo, facilitando la organización y asegurando que cada detalle se manejara con precisión y rapidez. Este evento no solo celebró el deporte, sino que también demostró cómo la tecnología puede transformar y mejorar la gestión de eventos deportivos.

### Alcance

<!-- Aforo -->

El Torneo de las Fresas 2025 contó con una afluencia constante de espectadores a lo largo del día, sin registrar un "pico máximo" específico. **Se estima que más de 500 personas visitaron el evento** para apoyar a familiares y amigos, creando un ambiente vibrante y lleno de energía.

Muchos de estos visitantes se acercaron a las áreas donde se mostraba la clasificación de los grupos, aprovechando la funcionalidad del sistema para seguir el progreso de sus favoritos en tiempo real. Esta característica no solo facilitó la experiencia de los espectadores, sino que también permitió una mayor interacción y compromiso con el evento, asegurando que todos estuvieran informados sobre el desarrollo de los partidos.

### Adversidades y obstáculos

<!-- problemas y soluciones -->

El desarrollo del sistema para el Torneo de las Fresas 2025 presentó varios desafíos técnicos que requirieron soluciones innovadoras. A continuación, se detallan algunos de los principales obstáculos y cómo se superaron.

#### Retos y Soluciones en la implementación de la Ciencia de Datos

1. La falta de disponibilidad de una GPU en la nube para realizar grandes procesamientos de datos o utilizar modelos pesados de machine learning. Para mitigar este problema, se optó por procesar los datos localmente. Utilizando el entorno local, se realizaron los cálculos intensivos y luego se enviaron los datos ya procesados a través de la API Flask. Esta estrategia no solo evitó sobrecargar la API, sino que también eliminó errores de timeout y problemas de memoria en producción, asegurando un rendimiento eficiente y estable.

2. La poca compatibilidad de los servicios de deploy con versiones superiores a Python 3.10+, lo que complicaba el funcionamiento correcto de las librerías debido a problemas de compatibilidad. Afortunadamente, Render permitió el despliegue en versiones recientes de Python. Sin embargo, antes de descubrir esta opción, ya se había realizado un downgrade de las librerías y versiones de Python y Flask para asegurar la compatibilidad. Esta medida preventiva garantizó que el sistema funcionara sin problemas en cualquier entorno de despliegue, proporcionando una solución robusta y adaptable.

#### Desafíos del backend

1. El reto de realizar consultas SQL estándar (ANSI) compatibles tanto con MySQL/MariaDB y PostgreSQL. Durante la etapa de desarrollo se optó por utilizar MariaDB el cual es un sistema gestor de bases de datos más flexible al momento de declarar consultas SQL. Por otro lado, PostgreSQL adopta características más restrictivas en la declaración de las consultas con un tipado altamente fuerte. La integración de soluciones de mapeo relacional de objetos (ORM) permiten abstraer las consultas SQL, facilitando su ejecución y asegurando la compatibilidad entre los diferentes gestores de bases de datos implementados en un proyecto.

2. Encontrar un equilibrio entre la carga del servidor web y el servidor de la base de datos, implica decidir cómo distribuir los recursos entre ambos componentes. Reducir el número de peticiones HTTP realizadas por el cliente hacia un servicio se logra ejecutando un mayor número de consultas o formulando consultas más elaboradas, incrementando la carga sobre el sistema gestor de base de datos. Opuesto a ello, minimizar el número de consultas SQL ejecutadas obliga al cliente a realizar más peticiones HTTP, aumentando así la demanda de recursos del servicio de hosting o cloud. Diseñar y brindar los recursos necesarios en una API es punto clave para encontrar el balance: provee la información que realmente se necesita, limita y pagina grandes volúmenes de datos y evita el acceso a recursos innecesarios.

### Criticas y areas de mejora

<!-- comentarios recibidos y autocrítica -->
El Torneo de las Fresas 2025 fue un éxito rotundo, pero siempre hay espacio para la mejora y la innovación. A continuación, se presentan algunas áreas clave que podrían optimizarse para futuras ediciones del evento.

#### Horizontes de Mejora: Innovaciones Futuras en la Ciencia de Datos

- Modelos de Machine Learning Avanzados: Implementar algoritmos más sofisticados para predicciones precisas y detalladas sobre el rendimiento de jugadores y equipos.

- Estadísticas Completas y Detalladas: Ampliar el alcance de las estadísticas recopiladas para proporcionar una visión más completa del evento.

- Generación Dinámica de Perfiles de Usuario: Crear perfiles personalizados que se adapten a las preferencias y comportamientos individuales, mejorando la experiencia del usuario.

- Procesamiento de Datos Eficiente: Optimizar los procesos de recopilación y análisis de datos para obtener resultados en tiempo real y mejorar la capacidad de respuesta del sistema.

#### No todo es perfecto en el lado oscuro

* SEO: en el desarrollo backend, se ha estandarizado el uso de identificadores únicos (IDs) para acceder a recursos debido a su simplicidad y eficiencia. Sin embargo, ¿qué ocurre si el cliente que consume tu API prefiere utilizar URLs amigables en lugar de IDs?. Mapear tus endpoints a URLs amigables o soportar ambos formatos es una solución viable a considerar durante el diseño de tu aplicación.

* Frameworks: herramientas más robustas como Laravel o CodeIgniter aceleran el desarrollo de aplicaciones web al ofrecer soluciones ya conocidas sin reinventar la rueda.

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
