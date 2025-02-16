<?php

declare(strict_types=1);

namespace App\Validations;

/**
 * Clase base para todas las reglas de validación.
 */
abstract class BaseValidation
{
    /**
     * Método abstracto para obtener todas las reglas de validación.
     */
    abstract public static function getAllRules(): array;

    /**
     * Obtiene todos los campos a validar.
     */
    public static function getFields(): array
    {
        return array_keys(self::getAllRules());
    }

    /**
     * Obtiene una regla de validación.
     */
    public static function getRule(string $field): ?string
    {
        return self::getAllRules()[$field] ?? null;
    }
}
