<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\MatchCategoryModel;
use App\Validations\MatchCategoryValidation;

class MatchCategoryController extends BaseController
{
    /**
     * Muestra la información de todas las
     * "categorías de las rondas de los partidos".
     */
    public function index(): void
    {
        $categories = (new MatchCategoryModel)->orderBy('description ASC')->findAll();
        $this->respond($categories, 'Information about all the matches categories');
    }

    /**
     * Muestra la información de una
     * "categoría de las rondas de los partidos".
     */
    public function show(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = MatchCategoryValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The match category identifier is incorrect');
        }

        // Consulta la información de la "categoría del partido".
        $matchCategory = new MatchCategoryModel;
        $matchCategory->find($id);

        // Comprueba si existe la "categoría del partido".
        if (! $matchCategory->isHydrated()) {
            $this->respondNotFound('The match category information was not found');
        }

        $this->respond($matchCategory, 'Information about the match category');
    }
}
