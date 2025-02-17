<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla pivote
 * de los "jugadores de las parejas".
 */
class PlayerPairPivotModel extends BaseModel
{
    public function getTableName(): string
    {
        return 'players_pairs';
    }
}
