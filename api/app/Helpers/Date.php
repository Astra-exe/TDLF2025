<?php

declare(strict_types=1);

namespace App\Helpers;

/**
 * Colección de herramientas
 * para fechas y horas.
 */
class Date
{
    private const DATETIME_FORMAT = 'Y-m-d H:i:s';

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
    public static function strtodatetime(string $format): string
    {
        return date(self::DATETIME_FORMAT, strtotime($format));
    }

    /**
     * Obtiene el año actual.
     */
    public static function getCurrentYear(): int
    {
        return (int) date('Y');
    }
}
