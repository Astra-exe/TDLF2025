<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\MatchModel;
use App\Validations\MatchValidation;

class MatchController extends BaseController
{
    /**
     * Muestra la información de todos los "partidos".
     */
    public function index(): void
    {
        // Define los query params de la petición.
        $queryFields = [
            'page' => 1,
            'orderBy' => 'created_at',
            'sortBy' => 'desc',
            'registration_category_id' => null,
            'group_id' => null,
            'match_category_id' => null,
            'match_status_id' => null,
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
        $this->gump()->validation_rules(MatchValidation::getRules($queryNames));

        // Obtiene y establece los filtros de validación.
        $this->gump()->filter_rules(MatchValidation::getFilters($queryNames));

        // Comprueba los query params de la petición.
        $queryParams = $this->gump()->run($queryParams);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The matches search information is incorrect');
        }

        // Consulta la información de todos los "partidos" con paginación.
        $match = new MatchModel;
        $match->orderBy(sprintf('%s %s', $queryParams['orderBy'], $queryParams['sortBy']));

        // Filtra los "partidos" por identificador de categoría de inscripción,
        // identificador de grupo, identificador de categoría de partido,
        // identificador de estatus de partido y estatus de actividad.
        foreach (['registration_category_id', 'group_id', 'match_category_id', 'match_status_id', 'is_active'] as $param) {
            if (isset($queryParams[$param])) {
                $match->eq($param, $queryParams[$param]);
            }
        }

        // Obtiene la información sobre la paginación.
        $match->paginate($queryParams['page']);
        $pagination = $match->pagination;

        // Consulta la información de la categoría de inscripción,
        // categoría del partido y estatus del partido.
        $matches = array_map(static function (MatchModel $match): MatchModel {
            $match->setCustomData('registration_category', $match->registrationCategory);
            $match->setCustomData('match_category', $match->matchCategory);
            $match->setCustomData('match_status', $match->matchStatus);

            unset($match->registration_category_id, $match->match_status_id, $match->match_category_id);

            return $match;
        }, $match->findAll());

        $this->respondPagination($matches, $pagination, 'Information about all the matches with pagination');
    }

    /**
     * Muestra la información del "grupo" de un "partido".
     */
    public function group(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = MatchValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The match identifier is incorrect');
        }

        // Consulta la información del "partido".
        $match = new MatchModel;
        $match->select('id')->find($id);

        // Comprueba si existe el "partido".
        if (! $match->isHydrated()) {
            $this->respondNotFound('The match information was not found');
        }

        // Obtiene el "grupo" del "partido".
        $group = $match->_group;

        $group->setCustomData('registration_category', $group->registrationCategory);

        unset($group->registration_category_id);

        $this->respond($group, 'Information about the match group');
    }

    /**
     * Elimina la información de un "partido".
     */
    public function delete(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = MatchValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The match identifier is incorrect');
        }

        // Consulta la información del "partido".
        $match = new MatchModel;
        $match->find($id);

        // Comprueba si existe el "partido".
        if (! $match->isHydrated()) {
            $this->respondNotFound('The match information was not found');
        }

        $match->setCustomData('registration_category', $match->registrationCategory);
        $match->setCustomData('match_category', $match->matchCategory);
        $match->setCustomData('match_status', $match->matchStatus);

        unset($match->registration_category_id, $match->match_status_id, $match->match_category_id);

        // Elimina la información del "partido".
        $match->delete();

        $this->respondDeleted($match, 'The match was deleted successfully');
    }
}
