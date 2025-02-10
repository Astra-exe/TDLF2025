<?php

require_once __DIR__.'/vendor/autoload.php';

/**
 * Opciones de configuración de las migraciones de la base de datos.
 */

return (static function (): array {
    $options = \App\Helpers\Config::getFromFilename('database');

    return [
        'log_table_name' => 'phoenix_log',
        'migration_dirs' => [
            'first' => __DIR__.'/migrations/first_dir',
            'second' => __DIR__.'/migrations/second_dir',
        ],
        'environments' => [
            'production' => [
                'adapter' => $options['driver'],
                'port' => $options['port'],
                'username' => $options['username'],
                'password' => $options['password'],
                'db_name' => $options['database'],
                'charset' => $options['charset'],
                'collation' => $options['collation'],
            ],
        ],
        'default_environment ' => 'production',
        'indent' => '4spaces',
    ];
})();
