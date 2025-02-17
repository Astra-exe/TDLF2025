<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\PairModel;
use App\Models\PlayerModel;
use App\Models\PlayerPairPivotModel;
use App\Validations\PairValidation;

class PairController extends BaseController
{
    /**
     * Crea una "pareja" con la información de los "jugadores".
     */
    public function createWithPlayers(): void
    {
        // Define los campos necesarios de la petición.
        $requestFields = ['category_registration_id', 'players'];

        $data = [];

        // Obtiene solo los campos necesarios.
        foreach ($requestFields as $field) {
            $data[$field] = $this->app()->request()->data[$field] ?? null;
        }

        // Define los campos necesarios de la "pareja".
        $pairFields = ['category_registration_id'];

        // Define los campos necesarios de los "jugadores".
        $playersFields = ['fullname', 'city', 'weight', 'height', 'experience'];

        // Obtiene las reglas de validación.
        $rules = array_merge(
            PairValidation::getRules($pairFields),
            PairValidation::getPlayersRules($playersFields));

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
                'The information registration on pair with players is incorrect');
        }

        $pair = new PairModel;

        foreach ($pairFields as $field) {
            $pair->{$field} = $data[$field];
        }

        // Registra la información de la pareja.
        $pair->insert();

        $player = new PlayerModel;
        $playerPairPivot = new PlayerPairPivotModel;

        foreach ($data['players'] as $dataPlayer) {
            foreach ($playersFields as $field) {
                $player->{$field} = $dataPlayer[$field];
            }

            // Registra la información de los "jugadores".
            $player->insert();

            // Registra la relación del "jugador" con la "pareja".
            $playerPairPivot->copyFrom(['player_id' => $player->id, 'pair_id' => $pair->id]);
            $playerPairPivot->insert();

            $player->reset();
            $playerPairPivot->reset();
        }

        $this->respondCreated($pair->find()->toArray(), 'The pair with players was created correctly');
    }
}
