<?php

declare(strict_types=1);

namespace FirstDir;

use App\Helpers\Database;
use App\Helpers\Date;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que inserta información en la tabla
 * de los "roles de los usuarios de acceso".
 */
final class SeederRolesTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->insert('roles', [
            [
                'id' => Database::getUuid(),
                'name' => 'admin',
                'description' => 'Administrador',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
            [
                'id' => Database::getUuid(),
                'name' => 'web',
                'description' => 'Sitio web',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
            [
                'id' => Database::getUuid(),
                'name' => 'reader',
                'description' => 'Solo lectura',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
            [
                'id' => Database::getUuid(),
                'name' => 'judge',
                'description' => 'Juez',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
        ]);
    }

    protected function down(): void
    {
        $this->delete('users');
        $this->delete('roles');
    }
}
