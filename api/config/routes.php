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

    $router->get($base_route('/'), \App\Controllers\ApiController::class.'->welcome');

    // Autenticación.
    $router->post($base_route('/v1/auth/login'), \App\Controllers\AuthController::class.'->login');

    $router->group('', static function (\flight\net\Router $router) use ($base_route): void {
        // Autenticación del usuario de acceso.
        $router->get($base_route('/v1/auth/me'), \App\Controllers\AuthController::class.'->me');
        $router->get($base_route('/v1/auth/check'), \App\Controllers\AuthController::class.'->check');
        $router->post($base_route('/v1/auth/refresh'), \App\Controllers\AuthController::class.'->refresh');
        $router->post($base_route('/v1/auth/logout'), \App\Controllers\AuthController::class.'->logout');

        // Usuarios de acceso.
        $router->get($base_route('/v1/users'), \App\Controllers\UserController::class.'->index');
        $router->post($base_route('/v1/users'), \App\Controllers\UserController::class.'->create');
        $router->get($base_route('/v1/users/@id'), \App\Controllers\UserController::class.'->show');
        $router->put($base_route('/v1/users/@id'), \App\Controllers\UserController::class.'->update');
        $router->delete($base_route('/v1/users/@id'), \App\Controllers\UserController::class.'->delete');

        // Categorías de inscripción de parejas.
        $router->get($base_route('/v1/categories/registrations'), \App\Controllers\RegistrationCategoryController::class.'->index');
        $router->get($base_route('/v1/categories/registrations/@id'), \App\Controllers\RegistrationCategoryController::class.'->show');
        $router->get($base_route('/v1/categories/registrations/@id/groups'), \App\Controllers\RegistrationCategoryController::class.'->groups');

        // Jugadores.
        $router->get($base_route('/v1/players'), \App\Controllers\PlayerController::class.'->index');
        $router->post($base_route('/v1/players'), \App\Controllers\PlayerController::class.'->create');
        $router->get($base_route('/v1/players/@id'), \App\Controllers\PlayerController::class.'->show');
        $router->get($base_route('/v1/players/@id/pairs'), \App\Controllers\PlayerController::class.'->pair');
        $router->get($base_route('/v1/players/@id/groups'), \App\Controllers\PlayerController::class.'->group');
        $router->put($base_route('/v1/players/@id'), \App\Controllers\PlayerController::class.'->update');
        $router->delete($base_route('/v1/players/@id'), \App\Controllers\PlayerController::class.'->delete');

        // Parejas y jugadores.
        $router->get($base_route('/v1/pairs/players'), \App\Controllers\PairPlayerController::class.'->index');
        $router->get($base_route('/v1/pairs/@id/players'), \App\Controllers\PairPlayerController::class.'->show');
        $router->post($base_route('/v1/pairs/players'), \App\Controllers\PairPlayerController::class.'->create');

        // Parejas.
        $router->get($base_route('/v1/pairs'), \App\Controllers\PairController::class.'->index');
        $router->post($base_route('/v1/pairs'), \App\Controllers\PairController::class.'->create');
        $router->get($base_route('/v1/pairs/@id'), \App\Controllers\PairController::class.'->show');
        $router->get($base_route('/v1/pairs/@id/groups'), \App\Controllers\PairController::class.'->group');
        $router->put($base_route('/v1/pairs/@id'), \App\Controllers\PairController::class.'->update');
        $router->delete($base_route('/v1/pairs/@id'), \App\Controllers\PairController::class.'->delete');

        // Grupos y parejas.
        $router->get($base_route('/v1/groups/pairs'), \App\Controllers\GroupPairController::class.'->index');
        $router->get($base_route('/v1/groups/@id/pairs'), \App\Controllers\GroupPairController::class.'->show');
        $router->get($base_route('/v1/groups/@id/pairs/players'), \App\Controllers\GroupPairController::class.'->players');

        // Grupos y partidos.
        $router->get($base_route('/v1/groups/matches'), \App\Controllers\GroupMatchController::class.'->index');
        $router->get($base_route('/v1/groups/@id/matches'), \App\Controllers\GroupMatchController::class.'->show');

        // Grupos, partidos, parejas y jugadores.
        $router->get($base_route('/v1/groups/matches/pairs/players'), \App\Controllers\GroupMatchPairPlayerController::class.'->index');
        $router->get($base_route('/v1/groups/@id/matches/pairs/players'), \App\Controllers\GroupMatchPairPlayerController::class.'->show');

        // Grupos.
        $router->get($base_route('/v1/groups'), \App\Controllers\GroupController::class.'->index');
        $router->get($base_route('/v1/groups/@id'), \App\Controllers\GroupController::class.'->show');
        $router->put($base_route('/v1/groups/@id'), \App\Controllers\GroupController::class.'->update');
        $router->get($base_route('/v1/groups/@id/ranking'), \App\Controllers\GroupController::class.'->ranking');

        // Partidos y parejas.
        $router->get($base_route('/v1/matches/pairs'), \App\Controllers\MatchPairController::class.'->index');
        $router->get($base_route('/v1/matches/@id/pairs'), \App\Controllers\MatchPairController::class.'->show');
        $router->put($base_route('/v1/matches/@matchId/pairs/@pairId'), \App\Controllers\MatchPairController::class.'->update');

        // Partidos, parejas y jugadores.
        $router->get($base_route('/v1/matches/pairs/players'), \App\Controllers\MatchPairPlayerController::class.'->index');
        $router->get($base_route('/v1/matches/@id/pairs/players'), \App\Controllers\MatchPairPlayerController::class.'->show');

        // Partidos.
        $router->get($base_route('/v1/matches'), \App\Controllers\MatchController::class.'->index');
        $router->post($base_route('/v1/matches'), \App\Controllers\MatchController::class.'->create');
        $router->get($base_route('/v1/matches/@id'), \App\Controllers\MatchController::class.'->show');
        $router->get($base_route('/v1/matches/@id/groups'), \App\Controllers\MatchController::class.'->group');
        $router->put($base_route('/v1/matches/@id'), \App\Controllers\MatchController::class.'->update');
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

        // Acciones de las rondas del torneo.
        $router->post($base_route('/v1/rounds/init'), \App\Controllers\RoundController::class.'->init');

        // Modelo de datos.
        $router->get($base_route('/v1/analysis/profiles/@id'), App\Controllers\AnalysisController::class.'->profile');
        $router->get($base_route('/v1/analysis/heatmap'), App\Controllers\AnalysisController::class.'->heatmap');
    }, [\App\Middlewares\AuthMiddleware::class]);
})();
