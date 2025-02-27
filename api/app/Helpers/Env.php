<?php

declare(strict_types=1);

namespace App\Helpers;

use PhpDevCommunity\DotEnv;

/**
 * Colección de herramientas
 * para las variables de entorno.
 */
class Env
{
    private const PATH = __DIR__.'/../../.env';

    /**
     * Carga variables de entorno desde el archivo ".env".
     */
    public static function loadDotEnv(): void
    {
        (new DotEnv(self::PATH))->load();
    }

    /**
     * Establece el valor de una variable de entorno.
     */
    public static function set(string $varname, mixed $value = null): void
    {
        $_ENV[$varname] = $value;
    }

    /**
     * Obtiene el valor de una variable de entorno.
     */
    public static function get(string $varname, mixed $default = null): mixed
    {
        return $_ENV[$varname] ?? $_SERVER[$varname] ?? $default;
    }
}
