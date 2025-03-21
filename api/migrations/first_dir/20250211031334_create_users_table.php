<?php

declare(strict_types=1);

namespace FirstDir;

use Phoenix\Database\Element\ColumnSettings;
use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que crea la tabla
 * de los "usuarios de acceso".
 */
final class CreateUsersTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('users', 'id')
            ->addColumn('id', 'uuid')
            ->addColumn('email', 'string', ['length' => 128])
            ->addColumn('username', 'string', ['length' => 64])
            ->addColumn('role_id', 'uuid')
            ->addColumn('fullname', 'string', ['length' => 128])
            ->addColumn('password', 'string', ['length' => 255])
            ->addColumn('is_active', 'tinyinteger', ['signed' => false, 'length' => 1, 'default' => 1])
            ->addColumn('created_at', 'timestamp', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addColumn('updated_at', 'timestamp', ['default' => ColumnSettings::DEFAULT_VALUE_CURRENT_TIMESTAMP])
            ->addForeignKey('role_id', 'roles', 'id', ForeignKey::RESTRICT, ForeignKey::RESTRICT)
            ->addUniqueConstraint('email', 'users_email_unique')
            ->addUniqueConstraint('username', 'users_username_unique')
            ->create();
    }

    protected function down(): void
    {
        $this->table('users')->drop();
    }
}
