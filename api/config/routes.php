<?php

declare(strict_types=1);

/**
 * Definición de rutas y middlewares de la aplicación.
 */
return (static function () use ($app) {
    // Agrega un subdominio al path de la ruta.
    $base_route = static function (string $path) use ($app): string {
        return rtrim($app->get('flight.base_url'), '/').$path;
    };

    // Crea una instancia del enrutador.
    $router = $app->router();

    $router->get($base_route('/'), \App\Controllers\HomeController::class.'->welcome');
    $router->get($base_route('/categories/pairs'), \App\Controllers\CategoryPairController::class.'->index');
    $router->post($base_route('/pairs/players'), \App\Controllers\PairController::class.'->createWithPlayers');
})();
