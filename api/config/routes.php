<?php

declare(strict_types=1);

/**
 * Definición de rutas y middlewares de la aplicación.
 */
(static function () use ($app, $router): void {
    // Agrega un subdominio al path de la ruta.
    $base_route = static fn (string $path): string => $app->get('flight.base_url').$path;

    $router->get($base_route(''), \App\Controllers\HomeController::class.'->welcome');
})();
