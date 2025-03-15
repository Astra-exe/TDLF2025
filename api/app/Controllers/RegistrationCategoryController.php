<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\PairModel;
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
        $categories = (new RegistrationCategoryModel)->orderBy('name ASC')->findAll();
        $this->respond($categories, 'Information about all the categories of pairs players registration');
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
                'The registration category of pairs players identifier is incorrect');
        }

        // Consulta la información de la "categoría de inscripción".
        $registrationCategory = new RegistrationCategoryModel;
        $registrationCategory->find($id);

        // Comprueba si existe la "categoría de inscripción".
        if (! $registrationCategory->isHydrated()) {
            $this->respondNotFound('The registration category of pairs players information was not found');
        }

        $this->respond($registrationCategory, 'Information about the registration category of pairs players');
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
                'The registration category of pairs players identifier is incorrect');
        }

        // Consulta la información de la "categoría de inscripción".
        $registrationCategory = new RegistrationCategoryModel;
        $registrationCategory->select('id')->find($id);

        // Comprueba si existe la "categoría de inscripción".
        if (! $registrationCategory->isHydrated()) {
            $this->respondNotFound('The registration category of pairs players information was not found');
        }

        // Obtiene la información de los "grupos".
        $groups = (new PairModel)->select('groups.*', 'COUNT(pairs.id) AS num_pairs')
            ->join('groups_pairs', 'pairs.id = groups_pairs.pair_id', 'INNER')
            ->join('groups', 'groups_pairs.group_id = groups.id', 'INNER')
            ->eq('registration_category_id', $id)
            ->group('groups.id')
            ->findAll();

        $this->respond($groups, 'Information about the groups of the registration category of pairs players');
    }
}
