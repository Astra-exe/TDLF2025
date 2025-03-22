<?php

declare(strict_types=1);

namespace FirstDir;

use App\Helpers\Database;
use App\Helpers\Date;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que inserta la información en la tabla
 * de las "categorías de los partidos".
 */
final class SeederMatchCategoriesTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->insert('match_categories', [
            [
                'id' => Database::getUuid(),
                'name' => 'qualifier',
                'description' => 'Clasificación',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
            [
                'id' => Database::getUuid(),
                'name' => 'eighths',
                'description' => 'Octavos de final',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
            [
                'id' => Database::getUuid(),
                'name' => 'quarters',
                'description' => 'Cuartos de final',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
            [
                'id' => Database::getUuid(),
                'name' => 'semifinal',
                'description' => 'Semifinal',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
            [
                'id' => Database::getUuid(),
                'name' => 'final',
                'description' => 'Final',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
        ]);
    }

    protected function down(): void
    {
        $this->delete('matches');
        $this->delete('match_categories');
    }
}
