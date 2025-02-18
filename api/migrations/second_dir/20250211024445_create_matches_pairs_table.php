<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla pivote
 * de los "partidos de las parejas de jugadores".
 */
final class CreateMatchesPairsTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('matches_pairs', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('pair_id', 'uuid')
            ->addColumn('match_id', 'uuid')
            ->addColumn('score', 'tinyinteger', ['signed' => false, 'default' => 0])
            ->addColumn('is_winner', 'boolean', ['default' => false])
            ->addColumn('created_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addForeignKey('pair_id', 'pairs', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->addForeignKey('match_id', 'matches', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->addUniqueConstraint(['pair_id', 'match_id'], 'matches_pairs_pair_id_match_id_unique')
            ->create();
    }

    protected function down(): void
    {
        $this->table('matches_pairs')->drop();
    }
}
