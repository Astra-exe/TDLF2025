<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla
 * de las "API keys de los usuarios de acceso".
 */
final class CreateApiKeysTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('api_keys', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('user_id', 'uuid')
            ->addColumn('hash', 'string', ['length' => 255])
            ->addColumn('is_revoked', 'boolean', ['default' => false])
            ->addColumn('expires_at', 'datetime')
            ->addColumn('created_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'datetime', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addUniqueConstraint('user_id', 'api_keys_user_id_unique')
            ->addForeignKey('user_id', 'users', 'id', ForeignKey::CASCADE, ForeignKey::RESTRICT)
            ->create();
    }

    protected function down(): void
    {
        $this->table('api_keys')->drop();
    }
}
