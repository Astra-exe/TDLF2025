# API

API RESTful del evento de frontenis *"Torneo de las Fresas Irapuato 2025"*.

* [Documentación.](https://astra-exe.github.io/TDLF2025/api/)

## Instalación

* Copia el archivo `env.example` a `.env` para configurar la aplicación:

```
cp env.example .env
```

> Para `docker` también debes crear un archivo `.env`.

* Crea la base de datos del proyecto:

```
CREATE DATABASE IF NOT EXISTS `torneo_fresas`
  CHARACTER SET = 'utf8mb4'
  COLLATE = 'utf8mb4_general_ci';
```

* Crea las tablas de la base de datos:

```
vendor/bin/phoenix migrate
```

## Ejecución

```
php -S localhost:8080 -t public/
```

* <http://localhost:8080>

## Docker

```
docker build -t TDLF2025/api -f Dockerfile.dev ./
docker run --name TDLF2025-api --env-file .env -p 8080:80 TDLF2025/api
```

> Utiliza un usuario diferente a `root` en la configuración de la base de datos.

## Diagrama ER

* <https://drive.google.com/file/d/1KSYBmgTIAHmyknSqEVY3gK33IfuuOeMP/view?usp=sharing>

## Referencias

* [Easy installation of PHP extensions in official PHP Docker images.](https://github.com/mlocati/docker-php-extension-installer)
