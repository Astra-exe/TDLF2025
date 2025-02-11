<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla de las "parejas de los grupos de jugadores".
 */
final class CreateGroupsPairsTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('groups_pairs', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('pair_id', 'uuid')
            ->addColumn('group_id', 'uuid')
            ->addColumn('created_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addForeignKey('pair_id', 'pairs', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->addForeignKey('group_id', 'groups', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->addUniqueConstraint('pair_id', 'groups_pairs_pair_id_unique')
            ->create();
    }

    protected function down(): void
    {
        $this->table('groups_pairs')->drop();
    }
}
