<?php

declare(strict_types=1);

namespace FirstDir;

use App\Helpers\Database;
use App\Helpers\Date;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que inserta información en tabla
 * de las "categorías de inscripción de las parejas de jugadores".
 */
final class SeederCategoriesRegistrationsTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->insert('categories_registrations', [
            [
                'id' => Database::getUuid(),
                'name' => 'open',
                'description' => 'Categoría libre',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
            [
                'id' => Database::getUuid(),
                'name' => 'seniors',
                'description' => 'Categoría para 50 y más',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
        ]);
    }

    protected function down(): void
    {
        $this->delete('categories_registrations');
    }
}
