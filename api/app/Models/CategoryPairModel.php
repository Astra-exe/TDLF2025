<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla de las "categorías de las parejas de jugadores".
 */
class CategoryPairModel extends BaseModel
{
    public function getTableName(): string
    {
        return 'categories_pairs';
    }
}
