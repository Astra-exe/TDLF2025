<?php

use App\Helpers\Env;

/**
 * Opciones de configuración de la aplicación.
 */

// Establece la zona horario para todas las funciones de fecha y hora.
date_default_timezone_set(Env::get('APP_TIMEZONE', 'America/Mexico_City'));

return [
    'environment' => Env::get('APP_ENVIRONMENT', 'production'),
    'base_url' => Env::get('APP_BASE_URL', '/'),
    'secret' => Env::get('APP_SECRET', ''),
    'data_model_url' => Env::get('APP_DATA_MODEL_URL', 'http://localhost:3000'),
];
