<?php

require __DIR__.'/../vendor/autoload.php';

/**
 * Configuración y arranque de la aplicación.
 */

/**
 * Carga variables de entorno desde el archivo ".env".
 */
\App\Helpers\Env::loadDotEnv();

/**
 * Carga opciones de configuración de la aplicación.
 */
foreach (\App\Helpers\Config::getFromFilename('app') as $key => $value) {
    \App\Helpers\Env::set('APP_'.strtoupper($key), $value);
}

/**
 * Crea una instancia del framework.
 */
$app = \Flight::app();

/**
 * Establece opciones de configuración del framework.
 */
foreach (\App\Helpers\Config::getFromFilename('framework') as $key => $value) {
    $app->set($key, $value);
}

/**
 * Carga opciones de configuración de los servicios del framework.
 */
foreach (\App\Helpers\Config::getFromFilename('services') as $option) {
    $app->register($option['name'], $option['class'], $option['params'] ?? null);
}

/**
 * Habilita CORS.
 */
$app->before('start', [new \App\Middlewares\CorsMiddleware($app), 'before']);

/**
 * Carga las rutas y middlewares de la aplicación.
 *
 * Se pasa la variable "$app" al archivo.
 */
require __DIR__.'/routes.php';

/**
 * Inicia la ejecución del framework.
 */
$app->start();
