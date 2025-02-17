<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla
 * de las "parejas de jugadores".
 */
class PairModel extends BaseModel
{
    protected array $relations = [
        'category_registration' => [self::BELONGS_TO, CategoryRegistrationModel::class, 'category_registration_id'],
    ];

    public function getTableName(): string
    {
        return 'pairs';
    }

    protected function beforeInsert(BaseModel $self): void
    {
        parent::beforeInsert($self);

        $self->is_eliminated = (int) false;
    }
}
