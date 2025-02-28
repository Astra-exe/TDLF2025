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

    $router->group('', static function (\flight\net\Router $router) use ($base_route): void {
        // Autenticación del usuario de acceso.
        $router->get($base_route('/v1/auth/me'), \App\Controllers\AuthController::class.'->me');
        $router->get($base_route('/v1/auth/check'), \App\Controllers\AuthController::class.'->check');
        $router->post($base_route('/v1/auth/refresh'), \App\Controllers\AuthController::class.'->refresh');
        $router->post($base_route('/v1/auth/logout'), \App\Controllers\AuthController::class.'->logout');

        // Categorías de inscripción de parejas.
        $router->get($base_route('/v1/categories/registrations'), \App\Controllers\RegistrationCategoryController::class.'->index');
        $router->get($base_route('/v1/categories/registrations/@id'), \App\Controllers\RegistrationCategoryController::class.'->show');

        // Parejas.
        $router->get($base_route('/v1/pairs/@id'), \App\Controllers\PairController::class.'->show');

        // Parejas y jugadores.
        $router->post($base_route('/v1/pairs/players'), \App\Controllers\PairPlayerController::class.'->create');
        $router->get($base_route('/v1/pairs/@id/players'), \App\Controllers\PairPlayerController::class.'->show');
        $router->get($base_route('/v1/pairs/players/@id'), \App\Controllers\PairPlayerController::class.'->player');

        // Roles de los usuarios de acceso.
        $router->get($base_route('/v1/roles'), \App\Controllers\RoleController::class.'->index');
    }, [\App\Middlewares\AuthMiddleware::class]);
})();
