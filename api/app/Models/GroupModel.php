<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla de los "grupos".
 */
class GroupModel extends BaseModel
{
    protected array $relations = [
        'registrationCategory' => [
            self::BELONGS_TO, RegistrationCategoryModel::class,
            'registration_category_id',
            ['select' => ['id', 'name', 'description']],
        ],
        'groupPairPivot' => [
            self::HAS_MANY,
            GroupPairPivotModel::class,
            'group_id',
            ['orderBy' => 'created_at DESC'],
        ],
    ];

    public function getTableName(): string
    {
        return 'groups';
    }

    protected function beforeInsert(BaseModel $self): void
    {
        parent::beforeInsert($self);

        $self->is_eliminated = 0;
        $self->is_active = 1;
    }
}
