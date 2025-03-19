<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\MatchModel;
use App\Models\MatchPairPivotModel;
use App\Models\PairPlayerPivotModel;
use App\Validations\MatchValidation;

class MatchPairController extends BaseController
{
    public function index(): void {}

    /**
     * Muestra la información de las "parejas" del "partido".
     */
    public function show(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = MatchValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The match identifier is incorrect');
        }

        // Consulta la información del "partido".
        $match = new MatchModel;
        $match->select('id')->find($id);

        // Comprueba si existe el "partido".
        if (! $match->isHydrated()) {
            $this->respondNotFound('The match information was not found');
        }

        // Consulta la información de las "parejas" del "partido".
        $pairs = array_map(static function (MatchPairPivotModel $matchPairRel): array {
            $pair = $matchPairRel->pair;
            $pair->setCustomData('registration_category', $pair->registrationCategory);

            unset($pair->registration_category_id);

            return ['pair' => $pair, 'relationship' => $matchPairRel];
        }, $match->matchPairPivot);

        $this->respond($pairs, 'Information about the match pairs');
    }

    /**
     * Muestra la información de las "parejas" y "jugadores" del "partido".
     */
    public function players(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = MatchValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The match identifier is incorrect');
        }

        // Consulta la información del "partido".
        $match = new MatchModel;
        $match->select('id')->find($id);

        // Comprueba si existe el "partido".
        if (! $match->isHydrated()) {
            $this->respondNotFound('The match information was not found');
        }

        // Consulta la información de las "parejas" del "partido".
        $pairs = array_map(static function (MatchPairPivotModel $matchPairRel): array {
            $pair = $matchPairRel->pair;
            $pair->setCustomData('registration_category', $pair->registrationCategory);

            unset($pair->registration_category_id);

            // Consulta la información de los "jugadores" de la "pareja".
            $pair->setCustomData('players', array_map(static fn (PairPlayerPivotModel $pairPlayerRel): array => [
                'player' => $pairPlayerRel->player,
                'relationship' => $pairPlayerRel,
            ], $pair->pairPlayerPivot));

            return ['pair' => $pair, 'relationship' => $matchPairRel];
        }, $match->matchPairPivot);

        $this->respond($pairs, 'Information about the players of the match pairs');
    }
}
