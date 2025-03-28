<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\PlayerModel;
use App\Validations\PlayerValidation;
use PDOException;

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

            if (is_string($queryParams[$param]) && empty($queryParams[$param])) {
                $queryParams[$param] = $default;
            }

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
        $players->like($queryParams['filterBy'], sprintf('%%%s%%', $queryParams['search']));

        // Filtra los "jugadores" por estatus de actividad.
        if (isset($queryParams['is_active'])) {
            $players->eq('is_active', $queryParams['is_active']);
        }

        // Obtiene la información sobre la paginación.
        $players->paginate($queryParams['page']);
        $pagination = $players->pagination;

        // Aplica los parámetros de ordenamiento.
        $players->orderBy(sprintf('%s %s', $queryParams['orderBy'], $queryParams['sortBy']));

        $this->respondPagination($players->findAll(), $pagination, 'Information about all the players with pagination');
    }

    /**
     * Registra la información de un "jugador".
     */
    public function create(): void
    {
        // Define los campos necesarios de la petición.
        $fields = ['fullname', 'city', 'weight', 'height', 'age', 'experience'];

        $data = [];

        // Obtiene solo los campos necesarios.
        foreach ($fields as $field) {
            $data[$field] = $this->app()->request()->data->{$field} ?? null;
        }

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

        // Registra la información del "jugador".
        $player = new PlayerModel;
        $player->copyFrom($data);
        $player->insert();

        $id = $player->id;

        // Consulta la información del "jugador" registrado.
        $player->reset();
        $player->find($id);

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
        $player->select('id')->eq('id', $id)->find();

        // Comprueba si existe el "jugador".
        if (! $player->isHydrated()) {
            $this->respondNotFound('The player information was not found');
        }

        // Consulta la relación de la "pareja" con el "jugador".
        $pairPlayerRel = $player->pairPlayerPivot;

        // Consulta la "pareja" del "jugador".
        $pair = $pairPlayerRel->pair;

        // Consulta la "categoría de inscripción" de la "pareja".
        $pair->setCustomData('registration_category', $pair->registrationCategory);
        unset($pair->registration_category_id);

        $this->respond(['pair' => $pair, 'relationship' => $pairPlayerRel], 'Information about the player pair');
    }

    /**
     * Muestra la información del "grupo" de un "jugador".
     */
    public function group(string $id): void
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
        $player->select('id')->eq('id', $id)->find();

        // Comprueba si existe el "jugador".
        if (! $player->isHydrated()) {
            $this->respondNotFound('The player information was not found');
        }

        // Consulta la relación de la "pareja" con el "jugador".
        $pairPlayerRel = $player->pairPlayerPivot;

        // Consulta la relación de la "pareja" con el "grupo".
        $groupPairRel = $pairPlayerRel->pair->groupPairPivot;

        // Consulta el "grupo" de la "pareja".
        $group = $groupPairRel->_group;

        // Consulta la "categoría de inscripción" del "grupo".
        $group->setCustomData('registration_category', $group->registrationCategory);
        unset($group->registration_category_id);

        $this->respond([
            'group' => $group,
            'relationship_pair_player' => $pairPlayerRel,
            'relationship_group_pair' => $groupPairRel,
        ], 'Information about the player group');
    }

    /**
     * Modifica la información de un "jugador".
     */
    public function update(string $id): void
    {
        // Define los campos que se pueden modificar.
        $fields = ['fullname', 'city', 'weight', 'height', 'age', 'experience', 'is_active'];

        $data = ['id' => $id];

        // Obtiene solo los campos necesarios.
        foreach ($fields as $field) {
            $data[$field] = $this->app()->request()->data->{$field} ?? null;

            if (is_null($data[$field])) {
                unset($data[$field]);
            }
        }

        $fieldNames = array_keys($data);

        // Obtiene las reglas de validación
        // y establece el identificador como obligatorio.
        $rules = PlayerValidation::getRules(['id', ...$fieldNames]);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Establece los filtros de validación.
        $this->gump()->filter_rules(PlayerValidation::getFilters($fieldNames));

        // Valida el cuerpo de la petición.
        $data = $this->gump()->run($data);

        unset($data['id']);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The player information is incorrect');
        }

        // Consulta la información del "jugador".
        $player = new PlayerModel;
        $player->select('id')->eq('id', $id)->find();

        // Comprueba si existe el "jugador".
        if (! $player->isHydrated()) {
            $this->respondNotFound('The player information was not found');
        }

        // Modifica la información del "jugador".
        if (! empty($data)) {
            $player->copyFrom($data);
            $player->update();
            $player->reset();
        }

        // Consulta la información actualizada del "jugador".
        $player->find($id);

        $this->respondUpdated($player, 'The player was updated successfully');
    }

    /**
     * Elimina la información de un "jugador".
     */
    public function delete(string $id): void
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

        // Elimina la información del "jugador".
        try {
            $player->delete();
        } catch (PDOException $e) {
            $this->respondConflict('The player contains related information');
        }

        $this->respondDeleted($player, 'The player was deleted successfully');
    }
}
