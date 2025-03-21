<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla
 * de los "grupos de las parejas de los jugadores".
 */
final class CreateGroupsTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('groups', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('registration_category_id', 'uuid')
            ->addColumn('name', 'string', ['length' => 32])
            ->addColumn('description', 'string', ['length' => 64])
            ->addColumn('is_eliminated', 'tinyinteger', ['signed' => false, 'length' => 1, 'default' => 0])
            ->addColumn('is_active', 'tinyinteger', ['signed' => false, 'length' => 1, 'default' => 1])
            ->addColumn('created_at', 'timestamp', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'timestamp', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addForeignKey('registration_category_id', 'registration_categories', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->addUniqueConstraint(['registration_category_id', 'name'], 'groups_registration_category_id_name_unique')
            ->create();
    }

    protected function down(): void
    {
        $this->table('groups')->drop();
    }
}
