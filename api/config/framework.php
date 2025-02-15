<?php

use App\Helpers\Env;

/**
 * Opciones de configuración del framework.
 */
(static function () use ($app): void {
    $app->set('flight.base_url', Env::get('APP_BASE_URL'));
    $app->set('flight.case_sensitive', true);
    $app->set('flight.log_errors', true);
    $app->set('flight.handle_errors', true);
    $app->set('flight.content_length', true);
})();
