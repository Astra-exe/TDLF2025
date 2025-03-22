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
    private const NUM_PAIRS = 2;

    private static array $matchCategoriesIds = [];

    private static array $matchStatusIds = [];

    public static function getAllRules(): array
    {
        return [
            'id' => ['guidv4'],
            'registration_category_id' => ['guidv4', 'contains_list' => PairValidation::getRegistrationCategories()],
            'match_category_id' => ['guidv4', 'contains_list' => self::getMatchCategories()],
            'match_status_id' => ['guidv4', 'contains_list' => self::getMatchStatus()],
            'is_active' => ['boolean'],
            'page' => ['integer', 'min_numeric' => 1],
            'orderBy' => ['contains' => ['created_at', 'updated_at']],
            'sortBy' => ['contains' => ['asc', 'desc']],
            'pairs' => array_merge(['valid_array_size_equal' => self::getNumPairs()], ...array_values(PairValidation::getRules(['id']))),
        ];
    }

    public static function getAllFilters(): array
    {
        return [
            'is_active' => 'boolean|whole_number',
            'page' => 'whole_number',
            'sortBy' => 'upper_case',
        ];
    }

    /**
     * Obtiene los IDs de las "categorías de los partidos".
     */
    public static function getMatchCategories(): array
    {
        if (empty(self::$matchCategoriesIds)) {
            $categories = (new MatchCategoryModel)->select('id')->findAll();

            self::$matchCategoriesIds = array_column($categories, 'id');
        }

        return self::$matchCategoriesIds;
    }

    /**
     * Obtiene los IDs de los "estatus de juego de los partidos".
     */
    public static function getMatchStatus(): array
    {
        if (empty(self::$matchStatusIds)) {
            $status = (new MatchStatusModel)->select('id')->findAll();

            self::$matchStatusIds = array_column($status, 'id');
        }

        return self::$matchStatusIds;
    }

    /**
     * Obtiene el número de "contrincantes" en un "partido".
     */
    public static function getNumPairs(): int
    {
        return self::NUM_PAIRS;
    }
}
