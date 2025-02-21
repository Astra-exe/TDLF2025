<?php

declare(strict_types=1);

namespace App\Validations;

/**
 * Define las reglas de validación de la API Key.
 */
class AuthValidation extends BaseValidation
{
    public static function getAllRules(): array
    {
        return [
            'api_key' => ['required', 'regex' => '/^\S+$/', 'between_len' => [1, 255]],
        ];
    }

    public static function getAllFilters(): array
    {
        return [];
    }
}
