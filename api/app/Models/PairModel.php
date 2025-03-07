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
        'registrationCategory' => [
            self::BELONGS_TO, RegistrationCategoryModel::class,
            'registration_category_id',
            ['select' => 'id, name, description'],
        ],
        'pairPlayerPivot' => [self::HAS_MANY, PairPlayerPivotModel::class, 'pair_id'],
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
