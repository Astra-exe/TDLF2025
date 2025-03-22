<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla pivote
 * de los "partidos" de los "grupos".
 */
final class CreateGroupsMatchesTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('groups_matches', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('group_id', 'uuid')
            ->addColumn('match_id', 'uuid')
            ->addColumn('created_at', 'timestamp', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'timestamp', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addForeignKey('group_id', 'groups', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->addForeignKey('match_id', 'matches', 'id', ForeignKey::CASCADE, ForeignKey::RESTRICT)
            ->addUniqueConstraint(['group_id', 'match_id'], 'groups_matches_group_id_match_id_unique')
            ->create();
    }

    protected function down(): void
    {
        $this->table('groups_matches')->drop();
    }
}
