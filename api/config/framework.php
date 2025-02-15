<?php

use App\Helpers\Env;

/**
 * Opciones de configuración del framework.
 */
return [
    'flight.base_url' => Env::get('APP_BASE_URL'),
    'flight.case_sensitive' => true,
    'flight.log_errors' => true,
    'flight.handle_errors' => true,
    'flight.content_length' => true,
];
