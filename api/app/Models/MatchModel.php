<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla de "partidos".
 */
class MatchModel extends BaseModel
{
    public function getTableName(): string
    {
        return 'matches';
    }

    protected function beforeInsert(BaseModel $self): void
    {
        parent::beforeInsert($self);

        $self->is_active = 1;
    }
}
