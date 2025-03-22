<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\GroupModel;
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
}
