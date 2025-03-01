<?php

declare(strict_types=1);

namespace App\Validations;

/**
 * Define las reglas de validación de los "jugadores".
 */
class PlayerValidation extends BaseValidation
{
    public static function getAllRules(): array
    {
        return [
            'id' => ['guidv4'],
            'fullname' => ['alpha_space', 'between_len' => [1, 128]],
            'city' => ['alpha_space', 'between_len' => [1, 128]],
            'weight' => ['numeric', 'regex' => '/^\d+(\.\d{1,2})?$/', 'min_numeric' => 20, 'max_numeric' => 600],
            'height' => ['numeric', 'regex' => '/^\d+(\.\d{1,2})?$/', 'min_numeric' => 0.5, 'max_numeric' => 2.5],
            'experience' => ['integer', 'min_numeric' => 0, 'max_numeric' => 50],
            'is_active' => ['boolean'],
        ];
    }

    public static function getAllFilters(): array
    {
        return [
            'fullname' => 'trim',
            'city' => 'trim',
            'is_active' => 'boolean',
        ];
    }
}
