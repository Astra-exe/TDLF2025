<?php

declare(strict_types=1);

namespace App\Validations;

use App\Models\MatchCategoryModel;
use App\Models\MatchStatusModel;

/**
 * Define las reglas de validación de los "partidos".
 */
class MatchValidation extends BaseValidation
{
    private static array $matchCategoriesIDs = [];

    private static array $matchStatusIDs = [];

    public static function getAllRules(): array
    {
        return [
            'id' => ['guidv4'],
            'registration_category_id' => ['guidv4', 'contains_list' => PairValidation::getRegistrationCategories()],
            'group_id' => ['guidv4'],
            'match_category_id' => ['guidv4', 'contains_list' => self::getMatchCategories()],
            'match_status_id' => ['guidv4', 'contains_list' => self::getMatchStatus()],
            'is_active' => ['boolean'],
        ];
    }

    public static function getAllFilters(): array
    {
        return [
            'is_active' => 'boolean|whole_number',
        ];
    }

    /**
     * Obtiene los IDs de las "categorías de los partidos".
     */
    public static function getMatchCategories(): array
    {
        if (empty(self::$matchCategoriesIDs)) {
            $categories = (new MatchCategoryModel)->select('id')->findAll();

            self::$matchCategoriesIDs = array_column($categories, 'id');
        }

        return self::$matchCategoriesIDs;
    }

    /**
     * Obtiene los IDs de los "estatus de juego de los partidos".
     */
    public static function getMatchStatus(): array
    {
        if (empty(self::$matchStatusIDs)) {
            $status = (new MatchStatusModel)->select('id')->findAll();

            self::$matchStatusIDs = array_column($status, 'id');
        }

        return self::$matchStatusIDs;
    }
}
