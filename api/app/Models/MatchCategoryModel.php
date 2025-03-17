<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla
 * de las "categorías de los partidos".
 */
class MatchCategoryModel extends BaseModel
{
    protected array $relations = [
        'matches' => [self::HAS_MANY, MatchModel::class, 'match_category_id'],
    ];

    public function getTableName(): string
    {
        return 'match_categories';
    }
}
