<?php

declare(strict_types=1);

namespace App\Validations;

/**
 * Define las reglas de validación de las "grupos de parejas".
 */
class GroupValidation extends BaseValidation
{
    public static function getAllRules(): array
    {
        return [
            'id' => ['guidv4'],
            'registration_category_id' => ['guidv4', 'contains_list' => PairValidation::getRegistrationCategories()],
            'name' => ['alpha_dash', 'between_len' => [1, 32]],
            'description' => ['alpha_space', 'between_len' => [1, 64]],
            'is_eliminated' => ['boolean'],
            'is_active' => ['boolean'],
        ];
    }

    public static function getAllFilters(): array
    {
        return [
            'is_eliminated' => 'boolean|whole_number',
            'is_active' => 'boolean|whole_number',
        ];
    }
}
