<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla
 * de las "categorías de los partidos".
 */
class MatchStatusModel extends BaseModel
{
    protected array $relations = [
        'matches' => [
            self::HAS_MANY,
            MatchModel::class,
            'match_status_id',
            ['orderBy' => 'created_at DESC'],
        ],
    ];

    public function getTableName(): string
    {
        return 'match_status';
    }
}
