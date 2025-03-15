<?php

declare(strict_types=1);

namespace FirstDir;

use App\Helpers\Database;
use App\Helpers\Date;
use Phoenix\Migration\AbstractMigration;

/**
 * Migración que inserta información en la tabla
 * de las "categorías de inscripción de las parejas de jugadores".
 */
final class SeederRegistrationCategoriesTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->insert('registration_categories', [
            [
                'id' => Database::getUuid(),
                'name' => 'open',
                'description' => 'Libre',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
            [
                'id' => Database::getUuid(),
                'name' => 'seniors',
                'description' => '50 y más',
                'created_at' => Date::getCurrentDateTime(),
                'updated_at' => Date::getCurrentDateTime(),
            ],
        ]);
    }

    protected function down(): void
    {
        $this->delete('matches_pairs');
        $this->delete('groups_pairs');
        $this->delete('pairs_players');
        $this->delete('pairs');
        $this->delete('registration_categories');
    }
}
