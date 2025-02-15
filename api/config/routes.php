<?php

declare(strict_types=1);

/**
 * Definición de rutas y middlewares de la aplicación.
 */
return (static function () use ($app) {
    // Agrega un subdominio al path de la ruta.
    $base_route = static fn (string $path): string => $app->get('flight.base_url').$path;

    // Crea una instancia del enrutador.
    $router = $app->router();

    $router->get($base_route(''), \App\Controllers\HomeController::class.'->welcome');
})();
