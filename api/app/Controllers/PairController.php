<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\PairModel;
use App\Validations\PairValidation;

class PairController extends BaseController
{
    /**
     * Registra la información de una "pareja".
     */
    public function create(): void
    {
        // Define los campos necesarios de la petición.
        $fields = ['registration_category_id'];

        // Obtiene solo los campos necesarios.
        foreach ($fields as $field) {
            $data[$field] = $this->app()->request()->data->{$field} ?? null;
        }

        $data = [];

        // Obtiene las reglas de validación.
        $rules = PairValidation::getRules($fields);

        // Define todas las reglas de validación como obligatorias.
        foreach (array_keys($rules) as $rule) {
            array_unshift($rules[$rule], 'required');
        }

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Establece los filtros de validación.
        $this->gump()->filter_rules(PairValidation::getFilters($fields));

        // Valida el cuerpo de la petición.
        $data = $this->gump()->run($data);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The pair information is incorrect');
        }

        // Registra la información de la "pareja".
        $pair = new PairModel;
        $pair->copyFrom($data);
        $pair->insert();
        $pair->find();
        $pair->setCustomData('registration_category', $pair->registrationCategory);

        unset($pair->registration_category_id);

        $this->respondCreated($pair, 'The pair was created successfully');
    }

    /**
     * Muestra la información de una "pareja".
     */
    public function show(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = PairValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The pair identifier is incorrect');
        }

        // Consulta la información de la "pareja".
        $pair = new PairModel;
        $pair->find($id);

        // Comprueba si existe la "pareja".
        if (! $pair->isHydrated()) {
            $this->respondNotFound('The pair information was not found');
        }

        // Consulta la categoría de inscripción de la "pareja".
        $pair->setCustomData('registration_category', $pair->registrationCategory);

        unset($pair->registration_category_id);

        $this->respond($pair, 'Information about the pair');
    }
}
