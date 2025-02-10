<?php

declare(strict_types=1);

namespace App\Helpers;

/**
 * Colección de herramientas
 * para las variables de entorno.
 */
class Env
{
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
        return $_ENV[$varname] ?? $default;
    }
}
