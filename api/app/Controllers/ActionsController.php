<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\Date;
use App\Models\GroupModel;
use App\Models\GroupPairPivotModel;
use App\Models\PairModel;
use App\Models\RegistrationCategoryModel;

class ActionsController extends BaseController
{
    /**
     * Genera "grupos" para cada tipo de "categoría de inscripción"
     * y asigna las "parejas" de cada "categoría" a un "grupo" de manera aleatoria.
     *
     * Después de crearlos se generan todas las "partidos" posibles del mismo "grupo".
     */
    public function randomizeGroupsPairsMatches(): void
    {
        $settings = [
            'open' => ['max_pairs' => 4, 'max_groups' => 27],
            'seniors' => ['max_pairs' => 3, 'max_groups' => 27],
        ];

        // Obtiene la información de todas las "categorías de inscripción".
        $categories = (new RegistrationCategoryModel)->select('id', 'name')
            ->in('name', array_keys($settings))
            ->findAll();

        // Modelos.
        $pair = new PairModel;
        $group = new GroupModel;
        $groupPairPivot = new GroupPairPivotModel;

        $column = 'registration_category_id';

        // Obtiene el año actual.
        $year = Date::getCurrentYear();

        // Formato del nombre de los grupos.
        // Nombre: A_2025, B_2025, C_2025, ...
        // Descripción: A, B, C, ...
        foreach ($categories as $category) {
            // Obtiene el número de "parejas" de la "categoría".
            $pair->select('COUNT(*) AS _count')
                ->eq($column, $category->id)
                ->eq('is_active', 1)
                ->find();

            // Obtiene el número máximo de "parejas" por "grupo".
            $maxPairs = $settings[$category->name]['max_pairs'];

            // Calcula el número total de "grupos" de la "categoría".
            $numGroups = $pair->_count / $maxPairs;

            // Comprueba si la "categoría" completa los "grupos" de las "parejas de jugadores".
            if ($numGroups < 1 || is_float($numGroups)) {
                $this->respondDependecyError('The registration category of pairs players does not complete the groups');
            }

            // Obtiene el número máximo de "grupos" permitidos.
            $maxGroups = $settings[$category->name]['max_groups'];

            // Comprueba el número máximo de "grupos" permitidos.
            if ($numGroups > $maxGroups) {
                $this->respondDependecyError('The registration category of pairs players exceeds the number of allowed groups');
            }

            // Genera los nombres de los "grupos".
            $groupsNames = range('A', chr(64 + $numGroups));

            // Agrega la letra "Ñ" a los nombres de los "grupos".
            if ($numGroups > 14) {
                array_splice($groupsNames, 14, 0, 'Ñ');
                array_pop($groupsNames);
            }

            // Obtiene las "parejas" de la "categoría" y lo ordena de manera aleatoria.
            $pairs = $pair->reset()->select('id')
                ->eq($column, $category->id)
                ->eq('is_active', 1)
                ->findAll();

            shuffle($pairs);

            // Segmenta las "parejas" en el número total de "grupos".
            foreach (array_chunk($pairs, $numGroups) as $key => $segment) {
                // Registra la información del "grupo".
                $group->copyFrom([
                    $column => $category->id,
                    'name' => sprintf('%s_%u', $groupsNames[$key], $year),
                    'description' => $groupsNames[$key],
                ]);

                $group->insert();

                // Consulta la información del "grupo" registrado.
                $group->select('id')->find($group->id);

                // Registra la relación de la "pareja" con el "grupo".
                foreach ($segment as $_pair) {
                    $groupPairPivot->copyFrom(['group_id' => $group->id, 'pair_id' => $_pair->id]);
                    $groupPairPivot->insert();
                    $groupPairPivot->reset();
                }

                $group->reset();
            }
        }

        $pair->reset();
    }
}
