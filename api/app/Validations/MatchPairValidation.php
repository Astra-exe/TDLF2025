<?php

declare(strict_types=1);

namespace App\Validations;

/**
 * Define las reglas de validación de las "parejas" de los "partidos".
 */
class MatchPairValidation extends BaseValidation
{
    public static function getAllRules(): array
    {
        return [
            'id' => ['guidv4'],
            'pair_id' => ['guidv4'],
            'match_id' => ['guidv4'],
            'score' => ['integer', 'min_numeric' => 0, 'max_numeric' => 255],
            'is_winner' => ['boolean'],
        ];
    }

    public static function getAllFilters(): array
    {
        return [
            'is_winner' => 'boolean|whole_number',
        ];
    }
}
