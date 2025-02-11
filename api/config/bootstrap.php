<?php

require __DIR__.'/../vendor/autoload.php';

/**
 * Configuración y arranque de la aplicación.
 */

// Carga variables de entorno.
\App\Helpers\Env::loadDotEnv();

// Crea una instancia del framework.
$app = \Flight::app();

// Crea una instancia del enrutador.
$router = $app->router();

// Carga rutas y middlewares de la aplicación.
require __DIR__.'/routes.php';

// Inicia la ejecución del framework.
$app->start();
