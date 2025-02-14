<?php

use App\Helpers\Env;

/**
 * Opciones de configuración de la aplicación.
 */
return [
    'url' => Env::get('APP_URL', 'http://localhost:8080/'),
];
