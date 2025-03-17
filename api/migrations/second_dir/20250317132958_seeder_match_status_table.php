<?php

declare(strict_types=1);

namespace FirstDir;

use App\Helpers\Database;
use App\Helpers\Date;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que inserta la información en la tabla
 * de los "estatus de juego de los partidos".
 */
final class SeederMatchStatusTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->insert('match_status', [
            [
                'id' => Database::getUuid(),
                'name' => 'scheduled',
                'description' => 'Programado',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
            [
                'id' => Database::getUuid(),
                'name' => 'playing',
                'description' => 'En juego',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
            [
                'id' => Database::getUuid(),
                'name' => 'finalized',
                'description' => 'Finalizado',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
        ]);
    }

    protected function down(): void
    {
        $this->delete('matches_pairs');
        $this->delete('matches');
        $this->delete('match_status');
    }
}
