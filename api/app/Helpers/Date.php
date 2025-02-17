<?php

declare(strict_types=1);

namespace App\Helpers;

/**
 * Colección de herramientas
 * para fechas y horas.
 */
class Date
{
    /**
     * Obtiene el datetime del tiempo actual.
     */
    public static function getCurrentDateTime(): string
    {
        return date('Y-m-d H:i:s');
    }
}
