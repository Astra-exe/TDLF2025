<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla pivote
 * de las "parejas de los grupos".
 */
class GroupPairPivotModel extends BaseModel
{
    protected array $relations = [
        '_group' => [self::BELONGS_TO, GroupModel::class, 'group_id'],
        'pair' => [self::BELONGS_TO, PairModel::class, 'pair_id'],
    ];

    public function getTableName(): string
    {
        return 'groups_pairs';
    }
}
