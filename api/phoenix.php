<?php

declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';

/**
 * Opciones de configuración de las migraciones de la base de datos.
 */
return (static function (): array {
    // Carga variables de entorno desde el archivo ".env".
    \App\Helpers\Env::loadDotEnv();

    // Carga opciones de configuración de la aplicación.
    \App\Helpers\Config::getFromFilename('app');

    // Obtiene las opciones de configuración de la base de datos.
    $options = \App\Helpers\Config::getFromFilename('database');

    // Establece los directorios de las migraciones.
    $directories = ['first' => __DIR__.'/migrations/first_dir'];

    // Agrega el directorio de las migraciones de desarrollo.
    if (\App\Helpers\Env::get('APP_ENVIRONMENT') === 'development') {
        $directories['second'] = __DIR__.'/migrations/second_dir';
    }

    return [
        'log_table_name' => 'phoenix_log',
        'migration_dirs' => $directories,
        'environments' => [
            'production' => [
                'adapter' => $options['driver'],
                'host' => $options['host'],
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
