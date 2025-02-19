<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla de las "categorías de los partidos".
 */
final class CreateMatchCategoryTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('match_categories', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('name', 'string', ['length' => 32])
            ->addColumn('description', 'string', ['length' => 64])
            ->addColumn('created_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addUniqueConstraint('name', 'match_categories_name_unique')
            ->create();
    }

    protected function down(): void
    {
        $this->table('match_categories')->drop();
    }
}
