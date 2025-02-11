<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla de las "categorías de las parejas de jugadores".
 */
final class CreateCategoriesPairsTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('categories_pairs', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('name', 'string', ['length' => 32])
            ->addColumn('description', 'string', ['length' => 64])
            ->addColumn('created_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addUniqueConstraint('name', 'categories_pairs_name_unique')
            ->create();
    }

    protected function down(): void
    {
        $this->table('categories_pairs')->drop();
    }
}
