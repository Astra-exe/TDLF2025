<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla de los "grupos".
 */
class GroupModel extends BaseModel
{
    public function getTableName(): string
    {
        return 'groups';
    }
}
