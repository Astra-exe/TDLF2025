<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla pivote
 * de los "jugadores de las parejas".
 */
class PairPlayerPivotModel extends BaseModel
{
    protected array $relations = [
        'pair' => [self::BELONGS_TO, PairModel::class, 'pair_id'],
        'player' => [self::BELONGS_TO, PlayerModel::class, 'player_id'],
    ];

    public function getTableName(): string
    {
        return 'pairs_players';
    }
}
