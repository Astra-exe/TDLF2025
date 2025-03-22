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
     * Muestra la información de todas las "parejas de los grupos".
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
                'The groups pairs search information is incorrect');
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

        // Consulta los "grupos" de la búsqueda.
        $groups = array_map(static function (GroupModel $group): array {
            // Consulta la "categoría de inscripción" del "grupo".
            $group->setCustomData('registration_category', $group->registrationCategory);
            unset($group->registration_category_id);

            // Consulta la información de las "parejas" del "grupo".
            $pairs = array_map(static function (GroupPairPivotModel $groupPairRel): array {
                $pair = $groupPairRel->pair;

                // Consulta la "categoría de inscripción" de la "pareja".
                $pair->setCustomData('registration_category', $pair->registrationCategory);
                unset($pair->registration_category_id);

                return ['pair' => $pair, 'relationship' => $groupPairRel];
            }, $group->groupPairPivot);

            return ['group' => $group, 'pairs' => $pairs];
        }, $groupModel->findAll());

        $this->respondPagination($groups, $pagination, 'Information about all the groups pairs with pagination');
    }

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
        $group->select('id')->eq('id', $id)->find();

        // Comprueba si existe el "grupo".
        if (! $group->isHydrated()) {
            $this->respondNotFound('The group information was not found');
        }

        // Consulta la información de las "parejas" del "grupo".
        $pairs = array_map(static function (GroupPairPivotModel $groupPairRel): array {
            $pair = $groupPairRel->pair;

            // Consulta la "categoría de inscripción" de la "pareja".
            $pair->setCustomData('registration_category', $pair->registrationCategory);
            unset($pair->registration_category_id);

            return ['pair' => $pair, 'relationship' => $groupPairRel];
        }, $group->groupPairPivot);

        $this->respond($pairs, 'Information about the group pairs');
    }

    /**
     * Muestra la información de todas las "parejas" y "jugadores" del "grupo".
     */
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
        $group->select('id')->eq('id', $id)->find();

        // Comprueba si existe el "grupo".
        if (! $group->isHydrated()) {
            $this->respondNotFound('The group information was not found');
        }

        // Consulta la información de las "parejas" del "grupo".
        $pairs = array_map(static function (GroupPairPivotModel $groupPairRel): array {
            $pair = $groupPairRel->pair;

            // Consulta la "categoría de inscripción" de la "pareja".
            $pair->setCustomData('registration_category', $pair->registrationCategory);
            unset($pair->registration_category_id);

            // Consulta la información de los "jugadores" de la "pareja".
            $pair->setCustomData('players', array_map(static fn (PairPlayerPivotModel $pairPlayerRel): array => [
                'player' => $pairPlayerRel->player,
                'relationship' => $pairPlayerRel,
            ], $pair->pairPlayerPivot));

            return ['pair' => $pair, 'relationship' => $groupPairRel];
        }, $group->groupPairPivot);

        $this->respond($pairs, 'Information about the group pairs with players');
    }
}
