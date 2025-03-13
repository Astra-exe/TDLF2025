<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\PlayerModel;
use App\Validations\PlayerValidation;

class PlayerController extends BaseController
{
    /**
     * Muestra la información de todos los "jugadores".
     */
    public function index(): void
    {
        // Define los query params de la petición.
        $queryFields = [
            'page' => 1,
            'search' => '',
            'filterBy' => 'fullname',
            'orderBy' => 'created_at',
            'sortBy' => 'desc',
            'is_active' => null,
        ];

        $queryParams = [];

        // Obtiene solo los query params necesarios.
        foreach ($queryFields as $param => $default) {
            $queryParams[$param] = $this->app()->request()->query->{$param} ?? $default;

            if (is_null($queryParams[$param])) {
                unset($queryParams[$param]);
            }
        }

        $queryNames = array_keys($queryFields);

        // Obtiene y establece las reglas de validación.
        $this->gump()->validation_rules(PlayerValidation::getRules($queryNames));

        // Obtiene y establece los filtros de validación.
        $this->gump()->filter_rules(PlayerValidation::getFilters($queryNames));

        // Comprueba los query params de la petición.
        $queryParams = $this->gump()->run($queryParams);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The players search information is incorrect');
        }

        // Consulta la información de todos los "jugadores" con paginación.
        $players = new PlayerModel;
        $players->paginate($queryParams['page'])
            ->like($queryParams['filterBy'], sprintf('%%%s%%', $queryParams['search']))
            ->orderBy(sprintf('%s %s', $queryParams['orderBy'], $queryParams['sortBy']));

        // Filtra los "jugadores" por estatus de actividad.
        if (isset($queryParams['is_active'])) {
            $players->eq('is_active', $queryParams['is_active']);
        }

        // Obtiene la información sobre la paginación.
        $pagination = $players->pagination;

        $this->respondPagination($players->findAll(), $pagination, 'Information about all the players with pagination');
    }

    /**
     * Registra la información de un "jugador".
     */
    public function create(): void
    {
        // Define los campos necesarios de la petición.
        $fields = ['fullname', 'city', 'weight', 'height', 'age', 'experience'];

        // Obtiene solo los campos necesarios.
        foreach ($fields as $field) {
            $data[$field] = $this->app()->request()->data->{$field} ?? null;
        }

        $data = [];

        // Obtiene las reglas de validación.
        $rules = PlayerValidation::getRules($fields);

        // Define todas las reglas de validación como obligatorias.
        foreach (array_keys($rules) as $rule) {
            array_unshift($rules[$rule], 'required');
        }

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Establece los filtros de validación.
        $this->gump()->filter_rules(PlayerValidation::getFilters($fields));

        // Valida el cuerpo de la petición.
        $data = $this->gump()->run($data);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The player information is incorrect');
        }

        // Registra la información del jugador.
        $player = new PlayerModel;
        $player->copyFrom($data);
        $player->insert();
        $player->find();

        $this->respondCreated($player, 'The player was created successfully');
    }

    /**
     * Muestra la información de un "jugador".
     */
    public function show(string $id): void
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

        $this->respond($player, 'Information about the player');
    }

    /**
     * Muestra la información de la "pareja" de un "jugador".
     */
    public function pair(string $id): void
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
        $player->select('id')->find($id);

        // Comprueba si existe el "jugador".
        if (! $player->isHydrated()) {
            $this->respondNotFound('The player information was not found');
        }

        // Consulta la relación de la "pareja" con el "jugador".
        $relationship = $player->pairPlayerPivot;

        // Consulta la "pareja" del "jugador".
        $pair = $relationship->pair;
        $pair->setCustomData('registration_category', $pair->registrationCategory);

        unset($pair->registration_category_id);

        $this->respond(['pair' => $pair, 'relationship' => $relationship], 'Information about the player pair');
    }
}
