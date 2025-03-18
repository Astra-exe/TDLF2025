<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\MatchModel;
use App\Models\MatchPairPivotModel;
use App\Models\PairPlayerPivotModel;
use App\Validations\GroupValidation;

class GroupController extends BaseController
{
    // Muestra la información de los "partidos" del "grupo".
    public function matches(string $id)
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
        $matches = array_map(static function (MatchModel $match): array {
            $match->setCustomData('registration_category', $match->registrationCategory);
            $match->setCustomData('match_category', $match->matchCategory);
            $match->setCustomData('match_status', $match->matchStatus);

            // Consulta la información de los "jugadores" del "partido".
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

            unset($match->registration_category_id, $match->match_status_id, $match->match_category_id);

            return ['match' => $match];
        }, $group->matches);

        $this->respond($matches, 'Information about the group matches');
    }
}
