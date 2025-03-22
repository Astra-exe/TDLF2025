<?php

declare(strict_types=1);

namespace App\Validations;

/**
 * Define las reglas de validación de las "parejas con sus jugadores".
 */
class PairPlayerValidation extends BaseValidation
{
    public static function getAllRules(): array
    {
        return [
            'registration_category_id' => ['guidv4', 'contains_list' => PairValidation::getRegistrationCategories()],
            'players' => ['valid_array_size_equal' => PairValidation::getNumPlayers()],
        ];
    }

    public static function getAllFilters(): array
    {
        return [];
    }

    /**
     * Obtiene las reglas de validación de los "jugadores".
     */
    public static function getPlayersRules(array $fields): array
    {
        $result = [];

        foreach (PlayerValidation::getRules($fields) as $field => $value) {
            $result['players.*.'.$field] = $value;
        }

        return $result;
    }

    /**
     * Obtiene los filtros de validación de los "jugadores".
     */
    public static function getPlayersFilters(array $fields): array
    {
        $result = [];

        foreach (PlayerValidation::getFilters($fields) as $field => $value) {
            $result['players.*.'.$field] = $value;
        }

        return $result;
    }
}
