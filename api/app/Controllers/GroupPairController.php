<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\GroupPairPivotModel;
use App\Models\PairPlayerPivotModel;
use App\Validations\GroupValidation;

class GroupPairController extends BaseController
{
    /**
     * Muestra la información de las "parejas de un grupo".
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

        // Consulta la información de las "parejas" del "grupo".
        $pairs = array_map(static function (GroupPairPivotModel $relationship): array {
            $pair = $relationship->pair;
            $pair->setCustomData('registration_category', $pair->registrationCategory);

            unset($pair->registration_category_id);

            return ['pair' => $pair, 'relationship' => $relationship];
        }, $group->groupPairPivot);

        $this->respond($pairs, 'Information about the group pairs');
    }

    // Muestra la información de todas las "parejas" y "jugadores" del "grupo".
    public function players(string $id): void
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

        // Consulta la información de las "parejas" del "grupo".
        $pairs = array_map(static function (GroupPairPivotModel $groupPairRel): array {
            $pair = $groupPairRel->pair;
            $pair->setCustomData('registration_category', $pair->registrationCategory);

            unset($pair->registration_category_id);

            // Consulta la información de los "jugadores" de la "pareja".
            $pair->setCustomData('players', array_map(static fn (PairPlayerPivotModel $pairPlayerRel): array => [
                'player' => $pairPlayerRel->player,
                'relationship' => $pairPlayerRel,
            ], $pair->pairPlayerPivot));

            return ['pair' => $pair, 'relationship' => $groupPairRel];
        }, $group->groupPairPivot);

        $this->respond($pairs, 'Information about the players of the group pairs');
    }
}
