<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla pivote
 * de las "parejas de jugadores".
 */
final class CreatePairsTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('pairs', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('registration_category_id', 'uuid')
            ->addColumn('is_eliminated', 'tinyinteger', ['signed' => false, 'length' => 1, 'default' => 0])
            ->addColumn('is_active', 'tinyinteger', ['signed' => false, 'length' => 1, 'default' => 1])
            ->addColumn('created_at', 'timestamp', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'timestamp', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addForeignKey('registration_category_id', 'registration_categories', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->create();
    }

    protected function down(): void
    {
        $this->table('pairs')->drop();
    }
}
