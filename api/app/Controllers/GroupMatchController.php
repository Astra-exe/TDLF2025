<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\GroupMatchPivotModel;
use App\Models\GroupModel;
use App\Models\MatchPairPivotModel;
use App\Models\PairPlayerPivotModel;
use App\Validations\GroupValidation;

class GroupMatchController extends BaseController
{
    /**
     * Muestra la información de todos los "partidos" de los "grupos".
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
                'The groups matches search information is incorrect');
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
        $groups = array_map(static function (GroupModel $group): array {
            $group->setCustomData('registration_category', $group->registrationCategory);
            unset($group->registration_category_id);

            // Consulta la información de los "partidos" del "grupo".
            $matches = array_map(static function (GroupMatchPivotModel $groupMatchRel): array {
                $match = $groupMatchRel->match;
                $match->setCustomData('registration_category', $match->registrationCategory);
                $match->setCustomData('match_category', $match->matchCategory);
                $match->setCustomData('match_status', $match->matchStatus);

                unset($match->registration_category_id, $match->match_status_id, $match->match_category_id);

                return ['match' => $match, 'relationship' => $groupMatchRel];
            }, $group->groupMatchPivot);

            return ['group' => $group, 'matches' => $matches];
        }, $groupModel->findAll());

        $this->respondPagination($groups, $pagination, 'Information about all the groups matches with pagination');
    }

    /**
     * Muestra la información de los "partidos" de un "grupo".
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

        // Consulta la información de los "partidos" del "grupo".
        $matches = array_map(static function (GroupMatchPivotModel $groupMatchRel): array {
            $match = $groupMatchRel->match;
            $match->setCustomData('registration_category', $match->registrationCategory);
            $match->setCustomData('match_category', $match->matchCategory);
            $match->setCustomData('match_status', $match->matchStatus);

            unset($match->registration_category_id, $match->match_status_id, $match->match_category_id);

            return ['match' => $match, 'relationship' => $groupMatchRel];
        }, $group->groupMatchPivot);

        $this->respond($matches, 'Information about the group matches');
    }

    /**
     * Muestra la información de los "partidos"
     * "parejas" y "jugadores" del "grupo".
     */
    public function pairsPlayers(string $id): void
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

        // Consulta la información de los "partidos" del "grupo".
        $matches = array_map(static function (GroupMatchPivotModel $groupMatchRel): array {
            $match = $groupMatchRel->match;
            $match->setCustomData('registration_category', $match->registrationCategory);
            $match->setCustomData('match_category', $match->matchCategory);
            $match->setCustomData('match_status', $match->matchStatus);

            unset($match->registration_category_id, $match->match_status_id, $match->match_category_id);

            // Consulta la información de las "parejas" del "partido".
            $match->setCustomData('pairs', array_map(static function (MatchPairPivotModel $matchPairRel): array {
                $pair = $matchPairRel->pair;

                // Consulta la "categoría de inscripción" de la "pareja".
                $pair->setCustomData('registration_category', $pair->registrationCategory);
                unset($pair->registration_category_id);

                // Consulta la información de los "jugadores" de la "pareja".
                $pair->setCustomData('players', array_map(static fn (PairPlayerPivotModel $pairPlayerRel): array => [
                    'player' => $pairPlayerRel->player,
                    'relationship' => $pairPlayerRel,
                ], $pair->pairPlayerPivot));

                return ['pair' => $pair, 'relationship' => $matchPairRel];
            }, $match->matchPairPivot));

            return ['match' => $match, 'relationship' => $groupMatchRel];
        }, $group->groupMatchPivot);

        $this->respond($matches, 'Information about the group matches with pairs players');
    }
}
