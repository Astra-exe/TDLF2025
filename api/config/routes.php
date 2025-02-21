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

    // Autenticación.
    $router->post($base_route('/v1/auth/login'), \App\Controllers\AuthController::class.'->login');

    $router->group('', static function (\flight\net\Router $router) use ($base_route) {
        // Categorías de registro de parejas.
        $router->get($base_route('/v1/categories/registrations'), \App\Controllers\RegistrationCategoryController::class.'->index');

        // Parejas y jugadores.
        $router->post($base_route('/v1/pairs/players'), \App\Controllers\PairPlayerController::class.'->create');
        $router->get($base_route('/v1/pairs/@id/players'), \App\Controllers\PairPlayerController::class.'->show');

        // Roles de los usuarios de acceso.
        $router->get($base_route('/v1/roles'), \App\Controllers\RoleController::class.'->index');
    }, [\App\Middlewares\AuthMiddleware::class]);
})();
