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
        $router->get($base_route('/v1/categories/registrations/@id/groups'), \App\Controllers\RegistrationCategoryController::class.'->groups');

        // Jugadores.
        $router->get($base_route('/v1/players'), \App\Controllers\PlayerController::class.'->index');
        $router->post($base_route('/v1/players'), \App\Controllers\PlayerController::class.'->create');
        $router->get($base_route('/v1/players/@id'), \App\Controllers\PlayerController::class.'->show');
        $router->get($base_route('/v1/players/@id/pairs'), \App\Controllers\PlayerController::class.'->pair');
        $router->delete($base_route('/v1/players/@id'), \App\Controllers\PlayerController::class.'->delete');

        // Parejas y jugadores.
        $router->get($base_route('/v1/pairs/players'), \App\Controllers\PairPlayerController::class.'->index');
        $router->get($base_route('/v1/pairs/@id/players'), \App\Controllers\PairPlayerController::class.'->show');
        $router->post($base_route('/v1/pairs/players'), \App\Controllers\PairPlayerController::class.'->create');

        // Parejas.
        $router->post($base_route('/v1/pairs'), \App\Controllers\PairController::class.'->create');
        $router->get($base_route('/v1/pairs/@id'), \App\Controllers\PairController::class.'->show');
        $router->delete($base_route('/v1/pairs/@id'), \App\Controllers\PairController::class.'->delete');

        // Grupos.
        $router->get($base_route('/v1/groups'), \App\Controllers\GroupController::class.'->index');
        $router->get($base_route('/v1/groups/@id'), \App\Controllers\GroupController::class.'->show');
        $router->get($base_route('/v1/groups/@id/matches'), \App\Controllers\GroupController::class.'->matches');

        // Grupos y parejas.
        $router->get($base_route('/v1/groups/@id/pairs'), \App\Controllers\GroupPairController::class.'->show');
        $router->get($base_route('/v1/groups/@id/pairs/players'), \App\Controllers\GroupPairController::class.'->players');

        // Partidos.
        $router->delete($base_route('/v1/matches/@id'), \App\Controllers\MatchController::class.'->delete');

        // Categorías de los partidos.
        $router->get($base_route('/v1/categories/matches'), \App\Controllers\MatchCategoryController::class.'->index');
        $router->get($base_route('/v1/categories/matches/@id'), \App\Controllers\MatchCategoryController::class.'->show');

        // Estatus de los partidos.
        $router->get($base_route('/v1/status/matches'), \App\Controllers\MatchStatusController::class.'->index');
        $router->get($base_route('/v1/status/matches/@id'), \App\Controllers\MatchStatusController::class.'->show');

        // Roles de los usuarios de acceso.
        $router->get($base_route('/v1/roles'), \App\Controllers\RoleController::class.'->index');
        $router->get($base_route('/v1/roles/@id'), \App\Controllers\RoleController::class.'->show');

        // Acciones especiales.
        $router->post($base_route('/v1/actions/randomize/groups/pairs/matches'), \App\Controllers\ActionsController::class.'->randomizeGroupsPairsMatches');
    }, [\App\Middlewares\AuthMiddleware::class]);
})();
