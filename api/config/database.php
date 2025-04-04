<?php

declare(strict_types=1);

use App\Helpers\Env;

/**
 * Opciones de configuración de la base de datos.
 */
return (static function (): array {
    $options = [
        'driver' => Env::get('DB_DRIVER', 'mysql'),
        'host' => Env::get('DB_HOST', '127.0.0.1'),
        'port' => Env::get('DB_PORT', 3306),
        'database' => Env::get('DB_DATABASE', 'torneo_fresas'),
        'username' => Env::get('DB_USERNAME', 'TDLF2025'),
        'password' => Env::get('DB_PASSWORD', 'secret'),
        'charset' => Env::get('DB_CHARSET', 'utf8mb4'),
        'collation' => Env::get('DB_COLLATION', 'utf8mb4_general_ci'),
    ];

    $options['options'] = match ($options['driver']) {
        'mysql' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => sprintf('SET NAMES %s COLLATE %s', $options['charset'], $options['collation']),
            // PDO::ATTR_AUTOCOMMIT => true,
        ],
        default => [],
    };

    return $options;
})();
