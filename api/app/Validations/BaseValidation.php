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
     * Método abstracto para obtener todos los filtros de validación.
     */
    abstract public static function getAllFilters(): array;

    /**
     * Obtiene las reglas de validación.
     */
    public static function getRules(array $fields): array
    {
        $result = [];
        $rules = static::getAllRules();

        foreach ($fields as $field) {
            if (isset($rules[$field])) {
                $result[$field] = $rules[$field];
            }
        }

        return $result;
    }

    /**
     * Obtiene los filtros de validación.
     */
    public static function getFilters(array $fields): array
    {
        $result = [];
        $filters = static::getAllFilters();

        foreach ($fields as $field) {
            if (isset($filters[$field])) {
                $result[$field] = $filters[$field];
            }
        }

        return $result;
    }
}
