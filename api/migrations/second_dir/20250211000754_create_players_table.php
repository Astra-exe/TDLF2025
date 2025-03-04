<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla de "jugadores".
 */
final class CreatePlayersTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('players', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('fullname', 'string', ['length' => 128])
            ->addColumn('city', 'string', ['length' => 128])
            ->addColumn('weight', 'decimal', ['signed' => false, 'length' => 5, 'decimals' => 2])
            ->addColumn('height', 'decimal', ['signed' => false, 'length' => 3, 'decimals' => 2])
            ->addColumn('age', 'tinyinteger', ['signed' => false])
            ->addColumn('experience', 'tinyinteger', ['signed' => false, 'default' => 0])
            ->addColumn('is_active', 'boolean', ['default' => true])
            ->addColumn('created_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->create();
    }

    protected function down(): void
    {
        $this->table('players')->drop();
    }
}
