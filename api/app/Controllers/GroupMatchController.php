<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\GroupMatchPivotModel;
use App\Models\GroupModel;
use App\Models\MatchPairPivotModel;
use App\Models\PairPlayerPivotModel;
use App\Validations\GroupValidation;

class GroupMatchController extends BaseController
{
    /**
     * Muestra la información de los "partidos" de un "grupo".
     */
    public function show(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = GroupValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The group identifier is incorrect');
        }

        // Consulta la información del "grupo".
        $group = new GroupModel;
        $group->select('id')->find($id);

        // Comprueba si existe el "grupo".
        if (! $group->isHydrated()) {
            $this->respondNotFound('The group information was not found');
        }

        // Consulta la información de los "partidos" del "grupo".
        $matches = array_map(static function (GroupMatchPivotModel $relationship): array {
            $match = $relationship->match;
            $match->setCustomData('registration_category', $match->registrationCategory);
            $match->setCustomData('match_category', $match->matchCategory);
            $match->setCustomData('match_status', $match->matchStatus);

            unset($match->registration_category_id, $match->match_status_id, $match->match_category_id);

            return ['match' => $match, 'relationship' => $relationship];
        }, $group->groupMatchPivot);

        $this->respond($matches, 'Information about the group matches');
    }

    /**
     * Muestra la información de los "partidos"
     * "parejas" y "jugadores" del "grupo".
     */
    public function pairsPlayers(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = GroupValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The group identifier is incorrect');
        }

        // Consulta la información del "grupo".
        $group = new GroupModel;
        $group->select('id')->find($id);

        // Comprueba si existe el "grupo".
        if (! $group->isHydrated()) {
            $this->respondNotFound('The group information was not found');
        }

        // Consulta la información de los "partidos" del "grupo".
        $matches = array_map(static function (GroupMatchPivotModel $groupMatchRel): array {
            $match = $groupMatchRel->match;
            $match->setCustomData('registration_category', $match->registrationCategory);
            $match->setCustomData('match_category', $match->matchCategory);
            $match->setCustomData('match_status', $match->matchStatus);

            unset($match->registration_category_id, $match->match_status_id, $match->match_category_id);

            // Consulta la información de las "parejas" del "partido".
            $match->setCustomData('pairs', array_map(static function (MatchPairPivotModel $matchPairRel): array {
                $pair = $matchPairRel->pair;
                $pair->setCustomData('registration_category', $pair->registrationCategory);

                unset($pair->registration_category_id);

                // Consulta la información de los "jugadores" de la "pareja".
                $pair->setCustomData('players', array_map(static fn (PairPlayerPivotModel $pairPlayerRel): array => [
                    'player' => $pairPlayerRel->player,
                    'relationship' => $pairPlayerRel,
                ], $pair->pairPlayerPivot));

                return ['pair' => $pair, 'relationship' => $matchPairRel];
            }, $match->matchPairPivot));

            return ['match' => $match, 'relationship' => $groupMatchRel];
        }, $group->groupMatchPivot);

        $this->respond($matches, 'Information about the group matches with pairs players');
    }
}
