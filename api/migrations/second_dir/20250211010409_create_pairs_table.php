<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla de las "parejas de jugadores".
 */
final class CreatePairsTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('pairs', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('category_registration_id', 'uuid')
            ->addColumn('is_eliminated', 'boolean', ['default' => false])
            ->addColumn('created_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addForeignKey('category_registration_id', 'categories_registrations', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->create();
    }

    protected function down(): void
    {
        $this->table('pairs')->drop();
    }
}
