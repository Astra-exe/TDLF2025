<?php

require_once __DIR__.'/../vendor/autoload.php';

/**
 * Configuración y arranque de la aplicación.
 */

// Crea una instancia del framework.
$app = \Flight::app();

// Inicia la ejecución del framework.
$app->start();
