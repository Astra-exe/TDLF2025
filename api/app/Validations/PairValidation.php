<?php

declare(strict_types=1);

namespace App\Validations;

use App\Models\RegistrationCategoryModel;

/**
 * Define las reglas de validación de las "parejas de jugadores".
 */
class PairValidation extends BaseValidation
{
    private static array $categoriesRegistrationsIDs;

    public static function getAllRules(): array
    {
        return [
            'id' => ['guidv4'],
            'registration_category_id' => ['guidv4', 'contains_list' => self::getRegistrationCategories()],
            'is_eliminated' => ['boolean'],
            'page' => ['integer', 'min_numeric' => 1],
            'orderBy' => ['contains' => ['created_at', 'updated_at']],
            'sortBy' => ['contains' => ['asc', 'desc']],
        ];
    }

    public static function getAllFilters(): array
    {
        return [
            'is_eliminated' => 'boolean|whole_number',
            'page' => 'whole_number',
            'sortBy' => 'upper_case',
        ];
    }

    /**
     * Obtiene los IDs de las "categorías de inscripción de las parejas de jugadores".
     */
    private static function getRegistrationCategories(): array
    {
        if (empty(self::$categoriesRegistrationsIDs)) {
            $categories = (new RegistrationCategoryModel)->select('id')->findAll();

            self::$categoriesRegistrationsIDs = array_column($categories, 'id');
        }

        return self::$categoriesRegistrationsIDs;
    }

    /**
     * Obtiene las reglas de validación de los "jugadores".
     */
    public static function getPlayersRules(array $fields): array
    {
        $rules = PlayerValidation::getRules($fields);

        $result = ['players' => ['valid_array_size_equal' => 2]];

        foreach ($rules as $field => $value) {
            $result['players.*.'.$field] = $value;
        }

        return $result;
    }

    /**
     * Obtiene los filtros de validación de los "jugadores".
     */
    public static function getPlayersFilters(array $fields): array
    {
        $filters = PlayerValidation::getFilters($fields);

        $result = [];

        foreach ($filters as $field => $value) {
            $result['players.*.'.$field] = $value;
        }

        return $result;
    }
}
