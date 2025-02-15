<?php

use App\Helpers\Env;

/**
 * Opciones de configuración de la aplicación.
 */
return [
    'base_url' => Env::get('APP_BASE_URL', '/'),
];
