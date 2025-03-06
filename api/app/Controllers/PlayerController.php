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
        ];

        $queryParams = [];

        // Obtiene solo los query params necesarios.
        foreach ($queryFields as $query => $default) {
            $queryParams[$query] = $this->app()->request()->query->{$query} ?? $default;
        }

        $queryNames = array_keys($queryFields);

        // Obtiene y establece las reglas de validación.
        $this->gump()->validation_rules(PlayerValidation::getRules($queryNames));

        // Establece los filtros de validación.
        $this->gump()->filter_rules(PlayerValidation::getFilters($queryNames));

        // Comprueba los parámetros de la petición.
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

        // Obtiene la información sobre la paginación.
        $pagination = $players->pagination;

        $this->respondPagination($players->findAll(), $pagination, 'Information about all the players with pagination');
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
}
