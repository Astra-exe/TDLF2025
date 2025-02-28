<?php

declare(strict_types=1);

namespace App\Controllers;

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

        $registrationCategory = new RegistrationCategoryModel;
        $registrationCategory->find($id);

        // Comprueba si existe la "pareja".
        if (! $registrationCategory->isHydrated()) {
            $this->respondNotFound('The registration category of pairs players information was not found');
        }

        $this->respond($registrationCategory->toArray(), 'Information about the registration category of pairs players');
    }
}
