<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla de "partidos".
 */
class MatchModel extends BaseModel
{
    protected array $relations = [
        'registrationCategory' => [
            self::BELONGS_TO,
            RegistrationCategoryModel::class,
            'registration_category_id',
            ['select' => ['id', 'name', 'description']],
        ],
        'groupMatchPivot' => [
            self::HAS_ONE,
            GroupMatchPivotModel::class,
            'match_id',
        ],
        'matchCategory' => [
            self::BELONGS_TO,
            MatchCategoryModel::class,
            'match_category_id',
            ['select' => ['id', 'name', 'description']],
        ],
        'matchStatus' => [
            self::BELONGS_TO,
            MatchStatusModel::class,
            'match_status_id',
            ['select' => ['id', 'name', 'description']],
        ],
        'matchPairPivot' => [
            self::HAS_MANY,
            MatchPairPivotModel::class,
            'match_id',
            ['orderBy' => 'created_at DESC'],
        ],
    ];

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
