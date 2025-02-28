<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\PairModel;
use App\Models\PairPlayerPivotModel;
use App\Models\PlayerModel;
use App\Validations\PairValidation;
use App\Validations\PlayerValidation;

class PairPlayerController extends BaseController
{
    /**
     * Crea una "pareja" con la información de los "jugadores".
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

        // Define los campos necesarios de los "jugadores".
        $playersFields = ['fullname', 'city', 'weight', 'height', 'experience'];

        // Obtiene las reglas de validación.
        $rules = [
            ...PairValidation::getRules($pairFields),
            ...PairValidation::getPlayersRules($playersFields),
        ];

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
                'The registration information of the pair with the players is incorrect');
        }

        $pair = new PairModel;

        foreach ($pairFields as $field) {
            $pair->{$field} = $data[$field];
        }

        // Registra la información de la pareja.
        $pair->insert();

        $player = new PlayerModel;
        $pairPlayerPivot = new PairPlayerPivotModel;

        foreach ($data['players'] as $dataPlayer) {
            foreach ($playersFields as $field) {
                $player->{$field} = $dataPlayer[$field];
            }

            // Registra la información de los "jugadores".
            $player->insert();

            // Registra la relación del "jugador" con la "pareja".
            $pairPlayerPivot->copyFrom(['player_id' => $player->id, 'pair_id' => $pair->id]);
            $pairPlayerPivot->insert();

            $player->reset();
            $pairPlayerPivot->reset();
        }

        $this->respondCreated($pair->find(), 'The pair with the players was created successfully');
    }

    /**
     * Muestra la información de los "jugadores de una pareja".
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

        $this->respond($pair->pairPlayerPivot, 'Information about the pair players');
    }

    /**
     * Muestra la información de la "pareja" de un "jugador".
     */
    public function player(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = PlayerValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The player identifier is incorrect');
        }

        // Consulta la información del "jugador".
        $player = new PlayerModel;
        $player->find($id);

        // Comprueba si existe el "jugador".
        if (! $player->isHydrated()) {
            $this->respondNotFound('The player information was not found');
        }

        $this->respond($player->pairPlayerPivot, 'Information about the player pair');
    }
}
