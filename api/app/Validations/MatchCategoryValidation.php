<?php

declare(strict_types=1);

namespace App\Validations;

/**
 * Define las reglas de validación
 * de las "categorías de las rondas de los partidos".
 */
class MatchCategoryValidation extends BaseValidation
{
    public static function getAllRules(): array
    {
        return [
            'id' => ['guidv4'],
            'name' => ['alpha_dash', 'between_len' => [1, 32]],
            'description' => ['alpha_space', 'between_len' => [1, 64]],
        ];
    }

    public static function getAllFilters(): array
    {
        return [];
    }
}
