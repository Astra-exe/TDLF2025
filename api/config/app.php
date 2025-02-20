<?php

use App\Helpers\Env;

/**
 * Opciones de configuración de la aplicación.
 */

// Establece la zona horario para todas las funciones de fecha y hora.
date_default_timezone_set(Env::get('APP_TIMEZONE', 'America/Mexico_City'));

return [
    'base_url' => Env::get('APP_BASE_URL', '/'),
    'secret' => Env::get('APP_SECRET', ''),
];
