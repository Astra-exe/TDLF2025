<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\PairModel;
use App\Models\PairPlayerPivotModel;
use App\Models\PlayerModel;
use App\Validations\PairValidation;

class PairPlayerController extends BaseController
{
    /**
     * Muestra la información de todas las "parejas de jugadores".
     */
    public function index(): void
    {
        // Define los query params de la petición.
        $queryFields = [
            'page' => 1,
            'orderBy' => 'created_at',
            'sortBy' => 'desc',
            'registration_category_id' => null,
            'is_eliminated' => null,
            'is_active' => null,
        ];

        $queryParams = [];

        // Obtiene solo los query params necesarios.
        foreach ($queryFields as $param => $default) {
            $queryParams[$param] = $this->app()->request()->query->{$param} ?? $default;

            if (is_string($queryParams[$param]) && empty($queryParams[$param])) {
                $queryParams[$param] = $default;
            }

            if (is_null($queryParams[$param])) {
                unset($queryParams[$param]);
            }
        }

        $queryNames = array_keys($queryFields);

        // Obtiene y establece las reglas de validación.
        $this->gump()->validation_rules(PairValidation::getRules($queryNames));

        // Obtiene y establece los filtros de validación.
        $this->gump()->filter_rules(PairValidation::getFilters($queryNames));

        // Comprueba los query params de la petición.
        $queryParams = $this->gump()->run($queryParams);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The pairs players search information is incorrect');
        }

        // Consulta la información de todas las "parejas" con paginación.
        $pairs = new PairModel;
        $pairs->select('id')
            ->orderBy(sprintf('%s %s', $queryParams['orderBy'], $queryParams['sortBy']));

        // Filtra las "parejas" por estatus de eliminación y estatus de actividad.
        foreach (['registration_category_id', 'is_eliminated', 'is_active'] as $param) {
            if (isset($queryParams[$param])) {
                $pairs->eq($param, $queryParams[$param]);
            }
        }

        // Obtiene la información sobre la paginación.
        $pairs->paginate($queryParams['page']);
        $pagination = $pairs->pagination;

        // Consulta los "jugadores de todas las pareja".
        $players = array_map(static function (PairModel $pair): array {
            return array_map(static fn (PairPlayerPivotModel $relationship): array => [
                'player' => $relationship->player,
                'relationship' => $relationship,
            ], $pair->pairPlayerPivot);
        }, $pairs->findAll());

        $this->respondPagination($players, $pagination, 'Information about all the pairs players with pagination');
    }

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
        $playersFields = ['fullname', 'city', 'weight', 'height', 'age', 'experience'];

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

        // Establece los filtros de validación.
        $this->gump()->filter_rules(PairValidation::getPlayersFilters($playersFields));

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

        // Registra la información de la "pareja".
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

        // Consulta la información de la "pareja" registrada.
        $pair->find($pair->id);
        $pair->setCustomData('registration_category', $pair->registrationCategory);

        unset($pair->registration_category_id);

        // Consulta los "jugadores" registrados de la "pareja".
        $players = array_map(static fn (PairPlayerPivotModel $relationship): array => [
            'player' => $relationship->player,
            'relationship' => $relationship,
        ], $pair->pairPlayerPivot);

        $this->respondCreated(['pair' => $pair, 'players' => $players], 'The pair with the players was created successfully');
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
        $pair->select('id')->find($id);

        // Comprueba si existe la "pareja".
        if (! $pair->isHydrated()) {
            $this->respondNotFound('The pair information was not found');
        }

        // Consulta los "jugadores" de la "pareja".
        $players = array_map(static fn (PairPlayerPivotModel $relationship): array => [
            'player' => $relationship->player,
            'relationship' => $relationship,
        ], $pair->pairPlayerPivot);

        $this->respond($players, 'Information about the pair players');
    }
}
