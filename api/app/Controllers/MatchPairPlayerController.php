<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\MatchModel;
use App\Models\MatchPairPivotModel;
use App\Models\PairPlayerPivotModel;
use App\Validations\MatchValidation;

class MatchPairPlayerController extends BaseController
{
    private const LIMIT = 24;

    /**
     * Muestra la información de todas las "parejas" y "jugadores" de los "partidos".
     */
    public function index(): void
    {
        // Define los query params de la petición.
        $queryFields = [
            'page' => 1,
            'orderBy' => 'created_at',
            'sortBy' => 'desc',
            'registration_category_id' => null,
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
                'The matches pairs search information is incorrect');
        }

        // Consulta la información de todos los "partidos" con paginación.
        $matchModel = new MatchModel;

        // Establece los filtros permitidos.
        foreach (['registration_category_id', 'match_category_id', 'match_status_id', 'is_active'] as $param) {
            if (isset($queryParams[$param])) {
                $matchModel->eq($param, $queryParams[$param]);
            }
        }

        // Obtiene la información sobre la paginación.
        $matchModel->paginate($queryParams['page'], self::LIMIT);
        $pagination = $matchModel->pagination;

        // Aplica los parámetros de ordenamiento.
        $matchModel->orderBy(sprintf('%s %s', $queryParams['orderBy'], $queryParams['sortBy']));

        // Consulta la información de las "parejas" de los "partido".
        $matches = array_map(static function (MatchModel $match): array {
            $match->setCustomData('registration_category', $match->registrationCategory);
            $match->setCustomData('match_category', $match->matchCategory);
            $match->setCustomData('match_status', $match->matchStatus);

            unset($match->registration_category_id, $match->match_status_id, $match->match_category_id);

            // Consulta la información de las "parejas".
            $pairs = array_map(static function (MatchPairPivotModel $matchPairRel): array {
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
            }, $match->matchPairPivot);

            return ['match' => $match, 'pairs' => $pairs];
        }, $matchModel->findAll());

        $this->respondPagination($matches, $pagination, 'Information about the matches pairs and players with pagination');
    }

    /**
     * Muestra la información de las "parejas" y "jugadores" del "partido".
     */
    public function show(string $id): void
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
        $match->select('id')->eq('id', $id)->find();

        // Comprueba si existe el "partido".
        if (! $match->isHydrated()) {
            $this->respondNotFound('The match information was not found');
        }

        // Consulta la información de las "parejas" del "partido".
        $pairs = array_map(static function (MatchPairPivotModel $matchPairRel): array {
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
        }, $match->matchPairPivot);

        $this->respond($pairs, 'Information about the match pairs with players');
    }
}
