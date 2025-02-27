# Define el Dockerfile base a utilizar.
FROM php:8.1-apache

# Instala las dependencias del proyecto.
RUN \
  apt-get update \
  && apt-get install -y --no-install-recommends --autoremove --purge \
    git \
    unzip \
    libicu-dev \
    mariadb-server \
  && apt-get clean \
  && docker-php-ext-install -j"$(nproc)" \
    pdo_mysql \
    bcmath \
    intl

# Instala composer desde la imagen oficial.
COPY --from=composer/composer:2-bin /composer /usr/local/bin/composer

# Establece variables de entorno en tiempo de ejecución.
ENV \
  APACHE_DOCUMENT_ROOT=/var/www/html \
  APACHE_APP_ROOT=/var/www/html/public \
  APACHE_PORT=80/tcp \
  DB_HOST="${DB_HOST:-127.0.0.1}" \
  DB_DATABASE="${DB_DATABASE:-torneo_fresas}" \
  DB_USERNAME="${DB_USERNAME:-TDLF2025}" \
  DB_PASSWORD="${DB_PASSWORD:-secret}" \
  DB_CHARSET="${DB_CHARSET:-utf8mb4}" \
  DB_COLLATE="${DB_COLLATE:-utf8mb4_general_ci}"

# Copia todos los archivos del proyecto a "/var/www/html/".
COPY ./ "${APACHE_DOCUMENT_ROOT}"
COPY ./.env "${APACHE_DOCUMENT_ROOT}"

# Utiliza la configuración en producción de PHP.
RUN mv "${PHP_INI_DIR}/php.ini-production" "${PHP_INI_DIR}/php.ini"

# Modifica la ruta raíz del servidor Apache a la carpeta "public/" del proyecto.
RUN sed -ri -e "s!/var/www/html!${APACHE_APP_ROOT}!g" /etc/apache2/sites-available/*.conf
RUN sed -ri -e "s!/var/www/!${APACHE_APP_ROOT}!g" /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Habilita la rescritura de rutas en Apache.
RUN a2enmod rewrite

# Estable el puerto que escucha Apache.
EXPOSE "${APACHE_PORT}"

# Define el espacio de trabajo del contenedor.
WORKDIR "${APACHE_DOCUMENT_ROOT}"

# Instala las dependencias del proyecto con "composer".
RUN composer install --no-dev -o

# Crea la base de datos de la aplicación,
# ejecuta las migraciones y el servidor Apache.
ENTRYPOINT \
  service mariadb start \
  && mariadb -e "CREATE DATABASE IF NOT EXISTS ${DB_DATABASE} CHARACTER SET = '${DB_CHARSET}' COLLATE = '${DB_COLLATE}';" \
  && mariadb -e "CREATE USER IF NOT EXISTS '${DB_USERNAME}'@'${DB_HOST}' IDENTIFIED BY '${DB_PASSWORD}';" \
  && mariadb -e "GRANT ALL PRIVILEGES ON ${DB_DATABASE}.* TO '${DB_USERNAME}'@'${DB_HOST}';" \
  && mariadb -e "FLUSH PRIVILEGES;" \
  && ./vendor/bin/phoenix migrate \
  && apache2ctl -D FOREGROUND
