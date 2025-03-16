<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla pivote
 * de las "parejas de los grupos".
 */
class GroupPairPivotModel extends BaseModel
{
    public function getTableName(): string
    {
        return 'groups_pairs';
    }
}
