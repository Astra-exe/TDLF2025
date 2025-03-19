# Define el Dockerfile base a utilizar.
FROM php:8.1-apache

# Instala las dependencias del proyecto.
RUN \
  apt-get update \
  && apt-get install -y --no-install-recommends --autoremove --purge \
    git \
    unzip \
    libicu-dev \
    libpq-dev \
  && apt-get clean \
  && docker-php-ext-install -j"$(nproc)" \
    pdo_pgsql \
    bcmath \
    intl

# Instala composer desde la imagen oficial.
COPY --from=composer/composer:2-bin /composer /usr/local/bin/composer

# Establece variables de entorno en tiempo de ejecución.
ENV \
  APACHE_DOCUMENT_ROOT=/var/www/html \
  APACHE_APP_ROOT=/var/www/html/public \
  APACHE_PORT=80/tcp

# Copia todos los archivos del proyecto a "/var/www/html/".
COPY ./ "${APACHE_DOCUMENT_ROOT}"

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
RUN composer install -n --no-dev -o

# Crea la base de datos de la aplicación,
# ejecuta las migraciones y el servidor Apache.
ENTRYPOINT \
  ./vendor/bin/phoenix migrate \
  && apache2ctl -D FOREGROUND
