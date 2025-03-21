<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\Date;
use App\Models\GroupMatchPivotModel;
use App\Models\GroupModel;
use App\Models\GroupPairPivotModel;
use App\Models\MatchCategoryModel;
use App\Models\MatchModel;
use App\Models\MatchPairPivotModel;
use App\Models\MatchStatusModel;
use App\Models\PairModel;
use App\Models\RegistrationCategoryModel;

class RoundController extends BaseController
{
    /**
     * Obtiene las reglas del torneo por "categoría de inscripción".
     */
    private function getRules(): array
    {
        return [
            'open' => ['max_pairs' => 4, 'max_groups' => 27],
            'seniors' => ['max_pairs' => 3, 'max_groups' => 27],
        ];
    }

    /**
     * Genera "grupos" para cada tipo de "categoría de inscripción"
     * y asigna las "parejas" de cada "categoría" a un "grupo" de manera aleatoria.
     *
     * Después de crearlos se generan todos los "partidos" posibles del mismo "grupo".
     */
    public function init(): void
    {
        $rules = $this->getRules();

        $registrationCategory = new RegistrationCategoryModel;
        $categoriesNames = array_keys($rules);

        // Obtiene la información de todas las "categorías de inscripción".
        $categories = $registrationCategory->select('id', 'name')
            ->in('name', $categoriesNames)
            ->findAll();

        // Obtiene la información de la "categoría de los partidos".
        $matchCategory = (new MatchCategoryModel)->select('id')
            ->eq('name', 'qualifier')
            ->find();

        // Obtiene la información del "estatus de juego de los partidos".
        $matchStatus = (new MatchStatusModel)->select('id')
            ->eq('name', 'scheduled')
            ->find();

        // Modelos.
        $pair = new PairModel;
        $group = new GroupModel;
        $groupPairPivot = new GroupPairPivotModel;
        $match = new MatchModel;
        $groupMatchPivot = new GroupMatchPivotModel;
        $matchPairPivot = new MatchPairPivotModel;

        $column = 'registration_category_id';

        // Obtiene el año actual.
        $year = Date::getCurrentYear();

        // Formato del nombre de los grupos.
        // Nombre: A_2025, B_2025, C_2025, ...
        // Descripción: A, B, C, ...
        foreach ($categories as $category) {
            $group->reset();

            // Obtiene el número de "grupos" de la "categoría".
            $group->select('COUNT(*) AS _count')
                ->eq($column, $category->id)
                ->eq('is_active', 1)
                ->find();

            // Ignora las "categorías" que contengan "grupos".
            if ($group->_count > 0) {
                continue;
            }

            $group->reset();

            // Obtiene los parámetro de configuración de la "categoría".
            $params = $rules[$category->name];

            // Obtiene el número de "parejas" de la "categoría".
            $pair->select('COUNT(*) AS _count')
                ->eq($column, $category->id)
                ->eq('is_active', 1)
                ->find();

            // Calcula el número total de "grupos" de la "categoría".
            $numGroups = $pair->_count / $params['max_pairs'];

            $pair->reset();

            // Comprueba si la "categoría" completa los "grupos" de las "parejas de jugadores".
            if ($numGroups < 1 || is_float($numGroups)) {
                $this->respondDependecyError('The registration category of pairs players does not complete the groups');
            }

            // Comprueba el número máximo de "grupos" permitidos.
            if ($numGroups > $params['max_groups']) {
                $this->respondDependecyError('The registration category of pairs players exceeds the number of allowed groups');
            }

            // Genera los nombres de los "grupos".
            $groupsNames = range('A', chr(64 + $numGroups));

            // Agrega la letra "Ñ" a los nombres de los "grupos".
            if ($numGroups > 14) {
                array_splice($groupsNames, 14, 0, 'Ñ');
                array_pop($groupsNames);
            }

            // Obtiene la información de las "parejas" de la "categoría"
            // y lo ordena de manera aleatoria.
            $pairs = $pair->select('id')
                ->eq($column, $category->id)
                ->eq('is_active', 1)
                ->findAll();

            $pair->reset();

            shuffle($pairs);

            // Segmenta las "parejas" en el número total de "grupos".
            foreach (array_chunk($pairs, $params['max_pairs']) as $key => $segment) {
                // Registra la información del "grupo".
                $group->copyFrom([
                    $column => $category->id,
                    'name' => sprintf('%s_%u', $groupsNames[$key], $year),
                    'description' => $groupsNames[$key],
                ]);

                $group->insert();

                // Registra la relación de la "pareja" con el "grupo".
                foreach ($segment as $_pair) {
                    $groupPairPivot->copyFrom(['group_id' => $group->id, 'pair_id' => $_pair->id]);
                    $groupPairPivot->insert();
                    $groupPairPivot->reset();
                }

                // Consulta la información de las "parejas" del grupo.
                $groupsPairs = $groupPairPivot->select('pair_id')
                    ->eq('group_id', $group->id)
                    ->findAll();

                $groupPairPivot->reset();

                // Registra la combinación de los "partidos"
                // de las "parejas" del "grupo".
                for ($i = 0; $i < $params['max_pairs']; $i++) {
                    for ($j = $i + 1; $j < $params['max_pairs']; $j++) {
                        // Registra la información del "partido".
                        $match->copyFrom([
                            $column => $category->id,
                            'match_category_id' => $matchCategory->id,
                            'match_status_id' => $matchStatus->id,
                        ]);

                        $match->insert();

                        // Registra la información del "partido" al "grupo".
                        $groupMatchPivot->copyFrom([
                            'group_id' => $group->id,
                            'match_id' => $match->id,
                        ]);

                        $groupMatchPivot->insert();
                        $groupMatchPivot->reset();

                        // Registra la información del "partido" de la "pareja combinada".
                        $matchPairPivot->copyFrom([
                            'match_id' => $match->id,
                            'pair_id' => $groupsPairs[$i]->pair_id,
                        ]);

                        $matchPairPivot->insert();
                        $matchPairPivot->reset();

                        // Registra la información del "partido" de la "otra pareja".
                        $matchPairPivot->copyFrom([
                            'match_id' => $match->id,
                            'pair_id' => $groupsPairs[$j]->pair_id,
                        ]);

                        $matchPairPivot->insert();
                        $matchPairPivot->reset();

                        $match->reset();
                    }
                }
            }
        }

        $this->respondNoContent('The round init action was executed successfully');
    }
}
