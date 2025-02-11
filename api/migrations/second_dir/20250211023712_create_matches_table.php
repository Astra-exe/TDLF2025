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
            ->addColumn('type_match_id', 'uuid')
            ->addColumn('status_match_id', 'uuid')
            ->addColumn('created_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addForeignKey('type_match_id', 'types_matches', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->addForeignKey('status_match_id', 'status_matches', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->create();
    }

    protected function down(): void
    {
        $this->table('matches')->drop();
    }
}
