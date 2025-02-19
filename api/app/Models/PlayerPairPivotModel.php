<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla pivote
 * de los "jugadores de las parejas".
 */
class PlayerPairPivotModel extends BaseModel
{
    protected array $relations = [
        'player' => [self::BELONGS_TO, PlayerModel::class, 'player_id'],
        'pair' => [self::BELONGS_TO, PairModel::class, 'pair_id'],
    ];

    public function getTableName(): string
    {
        return 'players_pairs';
    }
}
