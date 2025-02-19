<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla
 * de las "categorías de inscripción de las parejas de jugadores".
 */
class CategoryRegistrationModel extends BaseModel
{
    protected array $relations = [
        'pairs' => [self::HAS_MANY, PairModel::class, 'category_registration_id'],
    ];

    public function getTableName(): string
    {
        return 'categories_registrations';
    }
}
