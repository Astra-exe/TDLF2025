<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla
 * de las "categorías de inscripción de las parejas de jugadores".
 */
class RegistrationCategoryModel extends BaseModel
{
    protected array $relations = [
        'pairs' => [
            self::HAS_MANY, PairModel::class,
            'registration_category_id',
            ['eq' => ['is_active', 1], 'orderBy' => 'created_at DESC'],
        ],
        'groups' => [
            self::HAS_MANY, GroupModel::class,
            'registration_category_id',
            ['eq' => ['is_active', 1], 'orderBy' => 'name ASC'],
        ],
        'matches' => [
            self::HAS_MANY,
            MatchModel::class,
            'registration_category_id',
            ['eq' => ['is_active', 1], 'orderBy' => 'created_at DESC'],
        ],
    ];

    public function getTableName(): string
    {
        return 'registration_categories';
    }
}
