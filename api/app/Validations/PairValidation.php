<?php

declare(strict_types=1);

namespace App\Validations;

use App\Models\CategoryRegistrationModel;

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
            'category_registration_id' => ['guidv4', 'contains_list' => self::getCategoriesRegistrations()],
            'is_eliminated' => ['boolean'],
        ];
    }

    public static function getAllFilters(): array
    {
        return [
            'is_eliminated' => 'boolean',
        ];
    }

    /**
     * Obtiene los IDs de las "categorías de inscripción de las parejas de jugadores".
     */
    private static function getCategoriesRegistrations(): array
    {
        if (empty(self::$categoriesRegistrationsIDs)) {
            $categories = (new CategoryRegistrationModel)->select('id')->findAll();

            self::$categoriesRegistrationsIDs = array_column($categories, 'id');
        }

        return self::$categoriesRegistrationsIDs;
    }

    /**
     * Obtiene las reglas de validación de los "jugadores".
     */
    public static function getPlayersRules(array $fields): array
    {
        $result = [];
        $rules = PlayerValidation::getRules($fields);

        foreach ($rules as $field => $value) {
            $result['players.*.'.$field] = $value;
        }

        return $result;
    }
}
