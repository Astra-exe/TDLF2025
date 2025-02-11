<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla de los "grupos de las parejas de los jugadores".
 */
final class CreateGroupsTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('groups', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('name', 'string', ['length' => 32])
            ->addColumn('is_eliminated', 'boolean', ['default' => false])
            ->addColumn('created_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addUniqueConstraint('name', 'groups_name_unique')
            ->create();
    }

    protected function down(): void
    {
        $this->table('groups')->drop();
    }
}
