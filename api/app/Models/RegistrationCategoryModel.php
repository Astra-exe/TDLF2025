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
        'pairs' => [self::HAS_MANY, PairModel::class, 'registration_category_id'],
    ];

    public function getTableName(): string
    {
        return 'registration_categories';
    }
}
