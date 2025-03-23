<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\PairModel;
use App\Models\PairPlayerPivotModel;
use App\Validations\GroupValidation;

class GroupController extends BaseController
{
    /**
     * Muestra la información de todos los "grupos".
     */
    public function index(): void
    {
        // Define los query params de la petición.
        $queryFields = [
            'page' => 1,
            'search' => '',
            'filterBy' => 'name',
            'orderBy' => 'name',
            'sortBy' => 'asc',
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
        $this->gump()->validation_rules(GroupValidation::getRules($queryNames));

        // Obtiene y establece los filtros de validación.
        $this->gump()->filter_rules(GroupValidation::getFilters($queryNames));

        // Comprueba los query params de la petición.
        $queryParams = $this->gump()->run($queryParams);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The groups search information is incorrect');
        }

        // Consulta la información de todos los "grupos" con paginación.
        $groupModel = new GroupModel;
        $groupModel->like($queryParams['filterBy'], sprintf('%%%s%%', $queryParams['search']));

        // Establece los filtros permitidos.
        foreach (['registration_category_id', 'is_eliminated', 'is_active'] as $param) {
            if (isset($queryParams[$param])) {
                $groupModel->eq($param, $queryParams[$param]);
            }
        }

        // Obtiene la información sobre la paginación.
        $groupModel->paginate($queryParams['page']);
        $pagination = $groupModel->pagination;

        // Aplica los parámetros de ordenamiento.
        $groupModel->orderBy(sprintf('%s %s', $queryParams['orderBy'], $queryParams['sortBy']));

        // Consulta la "categoría de inscripción" de cada "grupo".
        $groups = array_map(static function (GroupModel $group): GroupModel {
            $group->setCustomData('registration_category', $group->registrationCategory);
            unset($group->registration_category_id);

            return $group;
        }, $groupModel->findAll());

        $this->respondPagination($groups, $pagination, 'Information about all the groups with pagination');
    }

    /**
     * Muestra la información de un "grupo".
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
        $group->find($id);

        // Comprueba si existe el "grupo".
        if (! $group->isHydrated()) {
            $this->respondNotFound('The group information was not found');
        }

        // Consulta la "categoría de inscripción" del "grupo".
        $group->setCustomData('registration_category', $group->registrationCategory);
        unset($group->registration_category_id);

        $this->respond($group, 'Information about the group');
    }

    /**
     * Modifica la información de un "grupo".
     */
    public function update(string $id): void
    {
        // Define los campos que se pueden modificar.
        $fields = ['is_eliminated', 'is_active'];

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
        $rules = GroupValidation::getRules(['id', ...$fieldNames]);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Establece los filtros de validación.
        $this->gump()->filter_rules(GroupValidation::getFilters($fieldNames));

        // Valida el cuerpo de la petición.
        $data = $this->gump()->run($data);

        unset($data['id']);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The group information is incorrect');
        }

        // Consulta la información del "grupo".
        $group = new GroupModel;
        $group->select('id')->eq('id', $id)->find();

        // Comprueba si existe el "grupo".
        if (! $group->isHydrated()) {
            $this->respondNotFound('The group information was not found');
        }

        // Modifica la información del "grupo".
        if (! empty($data)) {
            $group->copyFrom($data);
            $group->update();
            $group->reset();
        }

        // Consulta la información actualizada del "grupo".
        $group->find($id);

        // Consulta la "categoría de inscripción" del "grupo".
        $group->setCustomData('registration_category', $group->registrationCategory);
        unset($group->registration_category_id);

        $this->respond($group, 'The group was updated successfully');
    }

    /**
     * Ranking de "parejas" y "jugadores" del "grupo".
     */
    public function ranking(string $id): void
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
        $group->select('id')->eq('id', $id)->find();

        // Comprueba si existe el "grupo".
        if (! $group->isHydrated()) {
            $this->respondNotFound('The group information was not found');
        }

        $group->reset();

        // Consulta el ranking de las "parejas" del "grupo".
        $ranking = $group->select('pairs.*', 'SUM(CASE WHEN matches_pairs.is_winner = 1 THEN 1 ELSE 0 END) AS total_winners', 'SUM(matches_pairs.score) AS total_score')
            ->join('groups_matches', 'groups.id = groups_matches.group_id', 'INNER') // Partidos del grupo.
            ->join('matches_pairs', 'groups_matches.match_id = matches_pairs.match_id', 'INNER') // Parejas contrincantes del partido.
            ->join('pairs', 'matches_pairs.pair_id = pairs.id', 'INNER') // Parejas del partido.
            ->eq('id', $id)
            ->groupBy('pairs.id')
            ->orderBy('total_winners DESC', 'total_score DESC')
            ->findAll();

        // Obtiene la información de las "parejas".
        $pairs = array_map(static function (GroupModel $item) {
            $pair = new PairModel;
            $pair->copyFrom($item->toArray());

            // Consulta la "categoría de inscripción" de la "pareja".
            $pair->setCustomData('registration_category', $pair->registrationCategory);

            // Consulta los "jugadores" de la "pareja".
            $pair->setCustomData('players', array_map(static fn (PairPlayerPivotModel $pairPlayerRel): array => [
                'player' => $pairPlayerRel->player,
                'relationship' => $pairPlayerRel,
            ], $pair->pairPlayerPivot));

            // Obtiene los datos de "clasificación" de la "pareja".
            $rating = ['total_winners' => $pair->total_winners, 'total_score' => $pair->total_score];

            unset($pair->registration_category_id, $pair->total_winners, $pair->total_score);

            return ['pair' => $pair, 'rating' => $rating];
        }, $ranking);

        $this->respond($pairs, 'Information about the group ranking');
    }
}
