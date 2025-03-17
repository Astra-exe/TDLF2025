<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla pivote
 * de los "partidos de las parejas".
 */
class MatchPairPivotModel extends BaseModel
{
    protected array $relations = [
        'match' => [self::BELONGS_TO, MatchModel::class, 'match_id'],
        'pair' => [self::BELONGS_TO, PairModel::class, 'pair_id'],
    ];

    public function getTableName(): string
    {
        return 'matches_pairs';
    }

    protected function beforeInsert(BaseModel $self): void
    {
        parent::beforeInsert($self);

        $self->score = 0;
        $self->is_winner = 0;
    }
}
