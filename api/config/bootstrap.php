<?php

require __DIR__.'/../vendor/autoload.php';

/**
 * Configuración y arranque de la aplicación.
 */

// Carga variables de entorno.
\App\Helpers\Env::loadDotEnv();

// Crea una instancia del framework.
$app = \Flight::app();

// Carga opciones de configuración de la aplicación.
foreach (\App\Helpers\Config::getFromFilename('app') as $key => $value) {
    \App\Helpers\Env::set('APP_'.strtoupper($key), $value);
}

// Carga configuraciones del framework.
require __DIR__.'/framework.php';

// Crea una instancia del enrutador.
$router = $app->router();

// Carga rutas y middlewares de la aplicación.
// Se pasa la variable "$router" al archivo.
require __DIR__.'/routes.php';

// Inicia la ejecución del framework.
$app->start();
