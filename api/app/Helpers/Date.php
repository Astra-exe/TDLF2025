<?php

declare(strict_types=1);

namespace App\Helpers;

/**
 * Colección de herramientas
 * para fechas y horas.
 */
class Date
{
    public const DATETIME_FORMAT = 'Y-m-d H:i:s';

    /**
     * Obtiene el datetime del tiempo actual.
     */
    public static function getCurrentDateTime(): string
    {
        return date(self::DATETIME_FORMAT);
    }

    /**
     * Obtiene el datetime desde un formato de fecha y hora.
     */
    public static function strToDateTime(string $format): string
    {
        return date(self::DATETIME_FORMAT, strtotime($format));
    }
}
