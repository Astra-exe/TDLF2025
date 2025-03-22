<?php

declare(strict_types=1);

namespace App\Validations;

use App\Models\RegistrationCategoryModel;

/**
 * Define las reglas de validación de las "parejas de jugadores".
 */
class PairValidation extends BaseValidation
{
    private const NUM_PLAYERS = 2;

    private static array $registrationCategoriesIds = [];

    public static function getAllRules(): array
    {
        return [
            'id' => ['guidv4'],
            'registration_category_id' => ['guidv4', 'contains_list' => self::getRegistrationCategories()],
            'is_eliminated' => ['boolean'],
            'is_active' => ['boolean'],
            'page' => ['integer', 'min_numeric' => 1],
            'orderBy' => ['contains' => ['created_at', 'updated_at']],
            'sortBy' => ['contains' => ['asc', 'desc']],
            'players' => ['valid_array_size_equal' => self::getNumPlayers(), 'guidv4'],
        ];
    }

    public static function getAllFilters(): array
    {
        return [
            'is_eliminated' => 'boolean|whole_number',
            'is_active' => 'boolean|whole_number',
            'page' => 'whole_number',
            'sortBy' => 'upper_case',
        ];
    }

    /**
     * Obtiene el número de "jugadores" permitidos en una "pareja".
     */
    public static function getNumPlayers(): int
    {
        return self::NUM_PLAYERS;
    }

    /**
     * Obtiene los IDs de las "categorías de inscripción de las parejas de jugadores".
     */
    public static function getRegistrationCategories(): array
    {
        if (empty(self::$registrationCategoriesIds)) {
            $categories = (new RegistrationCategoryModel)->select('id')->findAll();

            self::$registrationCategoriesIds = array_column($categories, 'id');
        }

        return self::$registrationCategoriesIds;
    }
}
