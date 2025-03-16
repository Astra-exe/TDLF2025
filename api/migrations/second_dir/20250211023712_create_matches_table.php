<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla de los "partidos".
 */
final class CreateMatchesTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('matches', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('registration_category_id', 'uuid')
            ->addColumn('match_category_id', 'uuid')
            ->addColumn('match_status_id', 'uuid')
            ->addColumn('is_active', 'boolean', ['default' => true])
            ->addColumn('created_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addForeignKey('registration_category_id', 'registration_categories', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->addForeignKey('match_category_id', 'match_categories', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->addForeignKey('match_status_id', 'match_status', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->create();
    }

    protected function down(): void
    {
        $this->table('matches')->drop();
    }
}
