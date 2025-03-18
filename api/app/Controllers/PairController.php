<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\PairModel;
use App\Models\PairPlayerPivotModel;
use App\Models\PlayerModel;
use App\Validations\PairValidation;
use PDOException;

class PairController extends BaseController
{
    /**
     * Registra la información de una "pareja".
     */
    public function create(): void
    {
        // Define los campos necesarios de la petición.
        $requestFields = ['registration_category_id', 'players'];

        $data = [];

        // Obtiene solo los campos necesarios.
        foreach ($requestFields as $field) {
            $data[$field] = $this->app()->request()->data->{$field} ?? null;
        }

        // Define los campos necesarios de la "pareja".
        $pairFields = ['registration_category_id'];

        // Obtiene las reglas de validación de la "pareja".
        $rules = PairValidation::getRules($pairFields);

        // Obtiene las reglas de validación de los IDs de los "jugadores".
        $rules['players'] = array_merge(
            ...array_values(PairValidation::getPlayersRules(['id'])));

        // Define todas las reglas de validación como obligatorias.
        foreach (array_keys($rules) as $rule) {
            array_unshift($rules[$rule], 'required');
        }

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Valida el cuerpo de la petición.
        $data = $this->gump()->run($data);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The pair information is incorrect');
        }

        $player = new PlayerModel;

        // Comprueba que los "jugadores" existan
        // y no se encuentren dentro de una "pareja".
        foreach ($data['players'] as $id) {
            $player->select('id')->find($id);

            if (! $player->isHydrated()) {
                $this->respondValidationErrors(
                    ['players' => 'The players were not found'],
                    'The pair players information is incorrect');
            }

            if ($player->pairPlayerPivot->isHydrated()) {
                $this->respondValidationErrors(
                    ['players' => 'The players are already in a pair'],
                    'The pair players information is incorrect');
            }

            $player->reset();
        }

        $pair = new PairModel;

        foreach ($pairFields as $field) {
            $pair->{$field} = $data[$field];
        }

        // Registra la información de la "pareja".
        $pair->insert();

        $pairPlayerPivot = new PairPlayerPivotModel;

        // Registra la relación del "jugador" con la "pareja".
        foreach ($data['players'] as $id) {
            $pairPlayerPivot->copyFrom(['player_id' => $id, 'pair_id' => $pair->id]);
            $pairPlayerPivot->insert();
            $pairPlayerPivot->reset();
        }

        // Consulta la información de la "pareja" registrada.
        $pair->find($pair->id);
        $pair->setCustomData('registration_category', $pair->registrationCategory);

        unset($pair->registration_category_id);

        // Consulta los "jugadores" registrados de la "pareja".
        $players = array_map(static fn (PairPlayerPivotModel $relationship): array => [
            'player' => $relationship->player,
            'relationship' => $relationship,
        ], $pair->pairPlayerPivot);

        $this->respondCreated(['pair' => $pair, 'players' => $players], 'The pair was created successfully');
    }

    /**
     * Muestra la información de una "pareja".
     */
    public function show(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = PairValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The pair identifier is incorrect');
        }

        // Consulta la información de la "pareja".
        $pair = new PairModel;
        $pair->find($id);

        // Comprueba si existe la "pareja".
        if (! $pair->isHydrated()) {
            $this->respondNotFound('The pair information was not found');
        }

        // Consulta la categoría de inscripción de la "pareja".
        $pair->setCustomData('registration_category', $pair->registrationCategory);

        unset($pair->registration_category_id);

        $this->respond($pair, 'Information about the pair');
    }

    /**
     * Elimina la información de una "pareja".
     */
    public function delete(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = PairValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The pair identifier is incorrect');
        }

        // Consulta la información de la "pareja".
        $pair = new PairModel;
        $pair->find($id);

        // Comprueba si existe la "pareja".
        if (! $pair->isHydrated()) {
            $this->respondNotFound('The pair information was not found');
        }

        // Consulta la categoría de inscripción de la "pareja".
        $pair->setCustomData('registration_category', $pair->registrationCategory);

        unset($pair->registration_category_id);

        // Elimina la información de la "pareja".
        try {
            $pair->delete();
        } catch (PDOException) {
            $this->respondConflict('The pair contains related information');
        }

        $this->respondDeleted($pair, 'The pair was deleted successfully');
    }
}
