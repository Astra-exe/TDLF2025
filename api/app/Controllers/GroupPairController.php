<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\GroupModel;
use App\Validations\GroupValidation;

class GroupPairController extends BaseController
{
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

        // Consulta las "parejas" del "grupo".
        $pairs = array_map(static function ($groupPairRel) {
            $pair = $groupPairRel->pair;
            $pair->setCustomData('registration_category', $pair->registrationCategory);

            // Obtiene los "jugadores" de la "pareja".
            $pair->setCustomData('players', array_map(fn ($pairPlayerRel) => [
                'player' => $pairPlayerRel->player,
                'relationship' => $pairPlayerRel,
            ], $pair->pairPlayerPivot));

            unset($pair->registration_category_id);

            return [
                'pair' => $pair,
                'relationship' => $groupPairRel,
            ];
        }, $group->groupPairPivot);

        $this->respond($pairs, 'Information about the group pairs');
    }
}
