<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\PairModel;
use App\Models\PairPlayerPivotModel;
use App\Models\RegistrationCategoryModel;
use App\Validations\RegistrationCategoryValidation;

class RegistrationCategoryController extends BaseController
{
    /**
     * Muestra la información de todas las
     * "categorías de inscripción de las parejas de jugadores".
     */
    public function index(): void
    {
        $categories = (new RegistrationCategoryModel)->orderBy('description ASC')->findAll();
        $this->respond($categories, 'Information about all the registrations categories');
    }

    /**
     * Muestra la información de una
     * "categoría de inscripción de las parejas de jugadores".
     */
    public function show(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = RegistrationCategoryValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The registration category identifier is incorrect');
        }

        // Consulta la información de la "categoría de inscripción".
        $registrationCategory = new RegistrationCategoryModel;
        $registrationCategory->find($id);

        // Comprueba si existe la "categoría de inscripción".
        if (! $registrationCategory->isHydrated()) {
            $this->respondNotFound('The registration category information was not found');
        }

        $this->respond($registrationCategory, 'Information about the registration category');
    }

    /**
     * Muestra la información de los "grupos"
     * de una "categoría de inscripción de las parejas de jugadores".
     */
    public function groups(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = RegistrationCategoryValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The registration category identifier is incorrect');
        }

        // Consulta la información de la "categoría de inscripción".
        $registrationCategory = new RegistrationCategoryModel;
        $registrationCategory->select('id')->eq('id', $id)->find();

        // Comprueba si existe la "categoría de inscripción".
        if (! $registrationCategory->isHydrated()) {
            $this->respondNotFound('The registration category information was not found');
        }

        // Consulta la "categoría de inscripción" de los "grupos".
        $groups = array_map(static function (GroupModel $group): GroupModel {
            $group->setCustomData('registration_category', $group->registrationCategory);
            unset($group->registration_category_id);

            return $group;
        }, $registrationCategory->groups);

        $this->respond($groups, 'Information about the registration category groups');
    }

    /**
     * Ranking de las "parejas" y "jugadores" de la "categoría de inscripción".
     */
    public function ranking(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = RegistrationCategoryValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The registration category identifier is incorrect');
        }

        // Consulta la información de la "categoría de inscripción".
        $registrationCategory = new RegistrationCategoryModel;
        $registrationCategory->select('id')->eq('id', $id)->find();

        // Comprueba si existe la "categoría de inscripción".
        if (! $registrationCategory->isHydrated()) {
            $this->respondNotFound('The registration category information was not found');
        }

        // Consulta el ranking de las "parejas" del "grupo".
        $ranking = (new PairModel)->select('pairs.*', 'SUM(CASE WHEN matches_pairs.is_winner = 1 THEN 1 ELSE 0 END) AS total_winners', 'SUM(matches_pairs.score) AS total_score')
            ->join('matches_pairs', 'pairs.id = matches_pairs.pair_id', 'INNER') // Partidos de las parejas.
            ->eq('registration_category_id', $id)
            ->groupBy('pairs.id')
            ->orderBy('total_winners DESC', 'total_score DESC')
            ->findAll();

        // Obtiene la información de las "parejas".
        $pairs = array_map(static function (PairModel $pair): array {
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

        $this->respond($pairs, 'Information about the registration category ranking');
    }
}
