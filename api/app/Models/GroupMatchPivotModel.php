<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla pivote
 * de los "partidos" de los "grupos".
 */
class GroupMatchPivotModel extends BaseModel
{
    protected array $relations = [
        '_group' => [self::BELONGS_TO, GroupModel::class, 'group_id'],
        'match' => [self::BELONGS_TO, MatchModel::class, 'match_id'],
    ];

    public function getTableName(): string
    {
        return 'groups_matches';
    }
}
