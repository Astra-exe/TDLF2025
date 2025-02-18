<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla de "jugadores".
 */
class PlayerModel extends BaseModel
{
    public function getTableName(): string
    {
        return 'players';
    }

    protected function beforeInsert(BaseModel $self): void
    {
        parent::beforeInsert($self);

        $self->experience = 0;
        $self->is_active = (int) true;
    }
}
