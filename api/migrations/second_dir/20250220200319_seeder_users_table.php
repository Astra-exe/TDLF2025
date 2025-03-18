<?php

declare(strict_types=1);

namespace FirstDir;

use App\Helpers\Database;
use App\Helpers\Date;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que inserta la información en la tabla
 * de los "usuarios de acceso".
 */
final class SeederUsersTable extends AbstractMigration
{
    protected function up(): void
    {
        $roles = $this->select('SELECT id, name FROM roles');

        $find_role = static function (string $name) use ($roles): ?array {
            foreach ($roles as $role) {
                if ($role['name'] === $name) {
                    return $role;
                }
            }

            return null;
        };

        $this->insert('users', [
            [
                'id' => Database::getUuid(),
                'email' => 'franciscosolism08@gmail.com',
                'username' => 'ezio',
                'role_id' => $find_role('web')['id'],
                'fullname' => 'Francisco Solís Martínez',
                'password' => '$2y$10$qPOISeg/nx9jz8MNbsvpNOCNWnH22yCTrBlOC4DRCwUYVMKW15DUi',
                'is_active' => true,
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
            [
                'id' => Database::getUuid(),
                'email' => 'juan.ramirez.j99@gmail.com',
                'username' => 'astra',
                'role_id' => $find_role('reader')['id'],
                'fullname' => 'Juan José Ramírez López',
                'password' => '$2y$10$okFmKNpgJp3GVqi6oMUW9u0A6Dw1s9ppyEsR25taq82S/cKuM9Vx6',
                'is_active' => true,
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
            [
                'id' => Database::getUuid(),
                'email' => 'ricardogj08@riseup.net',
                'username' => 'ricardogj08',
                'role_id' => $find_role('admin')['id'],
                'fullname' => 'Ricardo García Jiménez',
                'password' => '$2y$10$cyBfiRA38HsO5UrasH1jkOTEozY7irgDZD3Ah1qzXTRDeRMY8PKa2',
                'is_active' => true,
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
        ]);
    }

    protected function down(): void
    {
        $this->delete('users');
    }
}
