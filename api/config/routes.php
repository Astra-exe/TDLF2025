<?php

declare(strict_types=1);

/**
 * Definición de rutas y middlewares de la aplicación.
 */
(static function () use ($router): void {
    $router->get('/', \App\Controllers\HomeController::class.'->welcome');
})();
