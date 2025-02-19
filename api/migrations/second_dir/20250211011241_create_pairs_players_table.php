<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla pivote
 * de los "jugadores de las parejas".
 */
final class CreatePairsPlayersTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('pairs_players', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('player_id', 'uuid')
            ->addColumn('pair_id', 'uuid')
            ->addColumn('created_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addForeignKey('player_id', 'players', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->addForeignKey('pair_id', 'pairs', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->addUniqueConstraint('player_id', 'pairs_players_player_id_unique')
            ->create();
    }

    protected function down(): void
    {
        $this->table('pairs_players')->drop();
    }
}
