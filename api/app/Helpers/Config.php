<?php

declare(strict_types=1);

namespace App\Helpers;

use RuntimeException;

/**
 * Colección de herramientas
 * para las opciones de configuración.
 */
class Config
{
    private const PATH = __DIR__.'/../../config/';

    /**
     * Obtiene opciones de configuración de un archivo
     * desde la carpeta "config/" de la raíz del proyecto.
     */
    public static function getFromFilename(string $filename): array
    {
        $config = require self::PATH.$filename.'.php';

        if (! is_array($config)) {
            throw new RuntimeException(sprintf('The config options file "%s" is not an array.', $filename));
        }

        return $config;
    }
}
