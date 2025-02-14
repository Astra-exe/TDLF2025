<?php

use App\Helpers\Env;

/**
 * Opciones de configuración del framework.
 */
(static function () use ($app): void {
    $app->set('base_url', Env::get('APP_URL'));
})();
