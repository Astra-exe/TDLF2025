<?php

declare(strict_types=1);

namespace SecondDir;

use App\Helpers\Database;
use App\Helpers\Date;
use Phoenix\Migration\AbstractMigration;

final class SeederPairsPlayersTable extends AbstractMigration
{
    protected function up(): void
    {
        $categories = $this->select('SELECT id, name FROM registration_categories');

        $find_category = static function (string $name) use ($categories): ?array {
            foreach ($categories as $category) {
                if ($category['name'] === $name) {
                    return $category;
                }
            }

            return null;
        };

        $universe = $this->getUniverse();

        // Itera sobre las parejas de cada categoría.
        foreach ($universe as $categoryName => $pairs) {
            $category = $find_category($categoryName);

            // Itera sobre todas las parejas de la categoría.
            foreach ($pairs as $players) {
                $pairId = Database::getUuid();

                // Registra una nueva pareja.
                $this->insert('pairs', [
                    'id' => $pairId,
                    'registration_category_id' => $category['id'],
                    'is_eliminated' => 0,
                    'is_active' => 1,
                    'created_at' => Date::getCurrentDateTime(),
                    'updated_at' => Date::getCurrentDateTime(),
                ]);

                // Itera sobre los jugadores de la pareja.
                foreach ($players as $player) {
                    $playerId = Database::getUuid();

                    // Registra un nuevo jugador.
                    $this->insert('players', array_merge([
                        'id' => $playerId,
                        'is_active' => 1,
                        'created_at' => Date::getCurrentDateTime(),
                        'updated_at' => Date::getCurrentDateTime(),
                    ], $player));

                    // Registra la relación del jugador con la pareja.
                    $this->insert('pairs_players', [
                        'id' => Database::getUuid(),
                        'pair_id' => $pairId,
                        'player_id' => $playerId,
                        'created_at' => Date::getCurrentDateTime(),
                        'updated_at' => Date::getCurrentDateTime(),
                    ]);
                }
            }
        }
    }

    protected function down(): void
    {
        $this->delete('matches');
        $this->delete('groups_pairs');
        $this->delete('groups');
        $this->delete('pairs');
        $this->delete('players');
    }

    private function getUniverse()
    {
        return [
            'open' => [
                [
                    ['fullname' => 'Luis Hernández', 'city' => 'León', 'weight' => 75.20, 'height' => 1.78, 'age' => 28, 'experience' => 12],
                    ['fullname' => 'María Guzmán', 'city' => 'Guanajuato', 'weight' => 62.50, 'height' => 1.68, 'age' => 24, 'experience' => 8],
                ],
                [
                    ['fullname' => 'Carlos Martínez', 'city' => 'Celaya', 'weight' => 78.40, 'height' => 1.80, 'age' => 32, 'experience' => 10],
                    ['fullname' => 'Ana Ramírez', 'city' => 'Irapuato', 'weight' => 63.10, 'height' => 1.65, 'age' => 26, 'experience' => 7],
                ],
                [
                    ['fullname' => 'Javier Torres', 'city' => 'Salamanca', 'weight' => 80.00, 'height' => 1.85, 'age' => 35, 'experience' => 15],
                    ['fullname' => 'Sofía López', 'city' => 'San Miguel de Allende', 'weight' => 65.00, 'height' => 1.70, 'age' => 29, 'experience' => 9],
                ],
                [
                    ['fullname' => 'Pedro Gómez', 'city' => 'Silao', 'weight' => 72.50, 'height' => 1.76, 'age' => 30, 'experience' => 11],
                    ['fullname' => 'Laura Vargas', 'city' => 'Dolores Hidalgo', 'weight' => 60.50, 'height' => 1.67, 'age' => 25, 'experience' => 6],
                ],
                [
                    ['fullname' => 'Diego Fernández', 'city' => 'Moroleón', 'weight' => 77.00, 'height' => 1.82, 'age' => 27, 'experience' => 8],
                    ['fullname' => 'Elena Morales', 'city' => 'Purísima del Rincón', 'weight' => 64.00, 'height' => 1.69, 'age' => 23, 'experience' => 5],
                ],
                [
                    ['fullname' => 'Miguel Ángel', 'city' => 'Apaseo el Grande', 'weight' => 79.50, 'height' => 1.84, 'age' => 33, 'experience' => 13],
                    ['fullname' => 'Gabriela Jiménez', 'city' => 'Uriangato', 'weight' => 66.20, 'height' => 1.72, 'age' => 28, 'experience' => 10],
                ],
                [
                    ['fullname' => 'José Ramírez', 'city' => 'Yuriria', 'weight' => 74.00, 'height' => 1.79, 'age' => 31, 'experience' => 14],
                    ['fullname' => 'Valeria Castro', 'city' => 'Acámbaro', 'weight' => 61.80, 'height' => 1.66, 'age' => 22, 'experience' => 4],
                ],
                [
                    ['fullname' => 'Raúl Sánchez', 'city' => 'Pénjamo', 'weight' => 76.30, 'height' => 1.81, 'age' => 29, 'experience' => 12],
                    ['fullname' => 'Daniela Ortega', 'city' => 'Comonfort', 'weight' => 63.50, 'height' => 1.68, 'age' => 24, 'experience' => 7],
                ],
                [
                    ['fullname' => 'Fernando Guerra', 'city' => 'Villagrán', 'weight' => 73.00, 'height' => 1.77, 'age' => 30, 'experience' => 9],
                    ['fullname' => 'Isabel Pérez', 'city' => 'Abasolo', 'weight' => 60.00, 'height' => 1.65, 'age' => 26, 'experience' => 6],
                ],
                [
                    ['fullname' => 'Roberto Díaz', 'city' => 'Jerécuaro', 'weight' => 78.00, 'height' => 1.83, 'age' => 34, 'experience' => 13],
                    ['fullname' => 'Claudia Mendoza', 'city' => 'Tarimoro', 'weight' => 64.50, 'height' => 1.70, 'age' => 27, 'experience' => 8],
                ],
                [
                    ['fullname' => 'Alejandro Ruiz', 'city' => 'Coroneo', 'weight' => 75.50, 'height' => 1.78, 'age' => 28, 'experience' => 11],
                    ['fullname' => 'Verónica Solís', 'city' => 'Cortazar', 'weight' => 62.00, 'height' => 1.67, 'age' => 25, 'experience' => 5],
                ],
                [
                    ['fullname' => 'Héctor Márquez', 'city' => 'Pueblo Nuevo', 'weight' => 79.00, 'height' => 1.84, 'age' => 36, 'experience' => 15],
                    ['fullname' => 'Patricia Navarro', 'city' => 'Santa Cruz de Juventino Rosas', 'weight' => 65.50, 'height' => 1.71, 'age' => 30, 'experience' => 10],
                ],
                [
                    ['fullname' => 'Ricardo Silva', 'city' => 'Doctor Mora', 'weight' => 74.50, 'height' => 1.80, 'age' => 32, 'experience' => 12],
                    ['fullname' => 'Karla Rivas', 'city' => 'Victoria', 'weight' => 63.00, 'height' => 1.68, 'age' => 27, 'experience' => 7],
                ],
                [
                    ['fullname' => 'Manuel Aguilar', 'city' => 'Xichú', 'weight' => 76.00, 'height' => 1.82, 'age' => 31, 'experience' => 10],
                    ['fullname' => 'Natalia Vega', 'city' => 'Atarjea', 'weight' => 64.20, 'height' => 1.69, 'age' => 26, 'experience' => 6],
                ],
                [
                    ['fullname' => 'Francisco Núñez', 'city' => 'San Felipe', 'weight' => 73.50, 'height' => 1.77, 'age' => 29, 'experience' => 9],
                    ['fullname' => 'Adriana Flores', 'city' => 'Ocampo', 'weight' => 60.80, 'height' => 1.66, 'age' => 24, 'experience' => 5],
                ],
                [
                    ['fullname' => 'Alberto Méndez', 'city' => 'San José Iturbide', 'weight' => 77.50, 'height' => 1.83, 'age' => 33, 'experience' => 13],
                    ['fullname' => 'Martha González', 'city' => 'Tierra Blanca', 'weight' => 65.00, 'height' => 1.70, 'age' => 28, 'experience' => 8],
                ],
                [
                    ['fullname' => 'Arturo López', 'city' => 'Romita', 'weight' => 78.50, 'height' => 1.84, 'age' => 35, 'experience' => 14],
                    ['fullname' => 'Rebeca Torres', 'city' => 'Purísima del Rincón', 'weight' => 66.00, 'height' => 1.72, 'age' => 30, 'experience' => 11],
                ],
                [
                    ['fullname' => 'Enrique Castro', 'city' => 'Juventino Rosas', 'weight' => 75.00, 'height' => 1.79, 'age' => 28, 'experience' => 12],
                    ['fullname' => 'Lourdes Herrera', 'city' => 'Apaseo el Alto', 'weight' => 62.50, 'height' => 1.67, 'age' => 25, 'experience' => 7],
                ],
                [
                    ['fullname' => 'Mario Guzmán', 'city' => 'Salvatierra', 'weight' => 79.20, 'height' => 1.81, 'age' => 34, 'experience' => 15],
                    ['fullname' => 'Sandra Paredes', 'city' => 'Jaral del Progreso', 'weight' => 64.80, 'height' => 1.68, 'age' => 27, 'experience' => 9],
                ],
                [
                    ['fullname' => 'Rodrigo Vázquez', 'city' => 'Cuerámaro', 'weight' => 74.80, 'height' => 1.78, 'age' => 30, 'experience' => 11],
                    ['fullname' => 'Miriam Alvarado', 'city' => 'Huanímaro', 'weight' => 63.00, 'height' => 1.66, 'age' => 26, 'experience' => 6],
                ],
                [
                    ['fullname' => 'Jorge Medina', 'city' => 'Pueblo Nuevo', 'weight' => 76.50, 'height' => 1.82, 'age' => 32, 'experience' => 13],
                    ['fullname' => 'Maricela Sánchez', 'city' => 'Moroleón', 'weight' => 65.20, 'height' => 1.70, 'age' => 29, 'experience' => 8],
                ],
                [
                    ['fullname' => 'Felipe Ramírez', 'city' => 'Yuriria', 'weight' => 73.80, 'height' => 1.77, 'age' => 29, 'experience' => 10],
                    ['fullname' => 'Carmen Mendoza', 'city' => 'Acámbaro', 'weight' => 61.50, 'height' => 1.65, 'age' => 24, 'experience' => 5],
                ],
                [
                    ['fullname' => 'Daniel Guerra', 'city' => 'Pénjamo', 'weight' => 78.00, 'height' => 1.83, 'age' => 33, 'experience' => 12],
                    ['fullname' => 'Leticia Ortega', 'city' => 'Comonfort', 'weight' => 63.50, 'height' => 1.68, 'age' => 25, 'experience' => 7],
                ],
                [
                    ['fullname' => 'Samuel Sánchez', 'city' => 'Villagrán', 'weight' => 75.00, 'height' => 1.79, 'age' => 28, 'experience' => 11],
                    ['fullname' => 'Rosa Pérez', 'city' => 'Abasolo', 'weight' => 60.00, 'height' => 1.66, 'age' => 23, 'experience' => 6],
                ],
            ],
            'seniors' => [
                [
                    ['fullname' => 'Antonio López', 'city' => 'León', 'weight' => 78.50, 'height' => 1.72, 'age' => 55, 'experience' => 25],
                    ['fullname' => 'Carmen Ramírez', 'city' => 'Guanajuato', 'weight' => 65.00, 'height' => 1.60, 'age' => 60, 'experience' => 30],
                ],
                [
                    ['fullname' => 'Jorge Hernández', 'city' => 'Celaya', 'weight' => 80.00, 'height' => 1.75, 'age' => 58, 'experience' => 28],
                    ['fullname' => 'María Guzmán', 'city' => 'Irapuato', 'weight' => 67.50, 'height' => 1.62, 'age' => 52, 'experience' => 22],
                ],
                [
                    ['fullname' => 'Roberto Torres', 'city' => 'Salamanca', 'weight' => 79.00, 'height' => 1.73, 'age' => 65, 'experience' => 35],
                    ['fullname' => 'Sofía Mendoza', 'city' => 'San Miguel de Allende', 'weight' => 66.00, 'height' => 1.61, 'age' => 57, 'experience' => 27],
                ],
                [
                    ['fullname' => 'Carlos Sánchez', 'city' => 'Silao', 'weight' => 77.50, 'height' => 1.74, 'age' => 54, 'experience' => 24],
                    ['fullname' => 'Laura Vargas', 'city' => 'Dolores Hidalgo', 'weight' => 64.50, 'height' => 1.63, 'age' => 59, 'experience' => 29],
                ],
                [
                    ['fullname' => 'Pedro Martínez', 'city' => 'Moroleón', 'weight' => 76.00, 'height' => 1.70, 'age' => 62, 'experience' => 32],
                    ['fullname' => 'Elena Morales', 'city' => 'Purísima del Rincón', 'weight' => 63.00, 'height' => 1.60, 'age' => 56, 'experience' => 26],
                ],
                [
                    ['fullname' => 'Fernando Gómez', 'city' => 'Apaseo el Grande', 'weight' => 78.20, 'height' => 1.71, 'age' => 53, 'experience' => 23],
                    ['fullname' => 'Gabriela Jiménez', 'city' => 'Uriangato', 'weight' => 65.50, 'height' => 1.62, 'age' => 61, 'experience' => 31],
                ],
                [
                    ['fullname' => 'José Ramírez', 'city' => 'Yuriria', 'weight' => 79.50, 'height' => 1.76, 'age' => 64, 'experience' => 34],
                    ['fullname' => 'Valeria Castro', 'city' => 'Acámbaro', 'weight' => 66.80, 'height' => 1.64, 'age' => 58, 'experience' => 28],
                ],
                [
                    ['fullname' => 'Raúl Sánchez', 'city' => 'Pénjamo', 'weight' => 77.00, 'height' => 1.72, 'age' => 57, 'experience' => 27],
                    ['fullname' => 'Daniela Ortega', 'city' => 'Comonfort', 'weight' => 64.00, 'height' => 1.60, 'age' => 55, 'experience' => 25],
                ],
                [
                    ['fullname' => 'Fernando Guerra', 'city' => 'Villagrán', 'weight' => 76.50, 'height' => 1.70, 'age' => 63, 'experience' => 33],
                    ['fullname' => 'Isabel Pérez', 'city' => 'Abasolo', 'weight' => 63.50, 'height' => 1.61, 'age' => 59, 'experience' => 29],
                ],
                [
                    ['fullname' => 'Roberto Díaz', 'city' => 'Jerécuaro', 'weight' => 78.00, 'height' => 1.73, 'age' => 56, 'experience' => 26],
                    ['fullname' => 'Claudia Mendoza', 'city' => 'Tarimoro', 'weight' => 65.20, 'height' => 1.62, 'age' => 60, 'experience' => 30],
                ],
                [
                    ['fullname' => 'Alejandro Ruiz', 'city' => 'Coroneo', 'weight' => 77.80, 'height' => 1.74, 'age' => 54, 'experience' => 24],
                    ['fullname' => 'Verónica Solís', 'city' => 'Cortazar', 'weight' => 64.80, 'height' => 1.63, 'age' => 58, 'experience' => 28],
                ],
                [
                    ['fullname' => 'Héctor Márquez', 'city' => 'Pueblo Nuevo', 'weight' => 79.20, 'height' => 1.75, 'age' => 61, 'experience' => 31],
                    ['fullname' => 'Patricia Navarro', 'city' => 'Santa Cruz de Juventino Rosas', 'weight' => 66.50, 'height' => 1.64, 'age' => 57, 'experience' => 27],
                ],
            ],
        ];

    }
}
