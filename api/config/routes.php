<?php

declare(strict_types=1);

/**
 * Definición de rutas y middlewares de la aplicación.
 */
return (static function () use ($app): void {
    // Agrega el subdominio al path de la ruta.
    $base_route = static function (string $path) use ($app): string {
        return rtrim($app->get('flight.base_url'), '/').$path;
    };

    // Crea una instancia del enrutador.
    $router = $app->router();

    $router->get($base_route('/'), \App\Controllers\HomeController::class.'->welcome');
    $router->get($base_route('/v1/categories/registrations'), \App\Controllers\RegistrationCategoryController::class.'->index');
    $router->post($base_route('/v1/pairs/players'), \App\Controllers\PairPlayerController::class.'->create');
    $router->get($base_route('/v1/pairs/@id/players'), \App\Controllers\PairPlayerController::class.'->show');
    $router->get($base_route('/v1/roles'), \App\Controllers\RoleController::class.'->index');
})();
