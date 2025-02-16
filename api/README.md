# API

API RESTful del evento "Torneo de las Fresas Irapuato 2025".

## Instalación

* Copia el archivo `env.example` a `.env` para configurar la aplicación:

```
cp env.example .env
```

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

## Diagrama ER

* <https://drive.google.com/file/d/1KSYBmgTIAHmyknSqEVY3gK33IfuuOeMP/view?usp=sharing>
