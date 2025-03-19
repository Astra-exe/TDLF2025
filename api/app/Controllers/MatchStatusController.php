<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\MatchStatusModel;
use App\Validations\MatchStatusValidation;

class MatchStatusController extends BaseController
{
    /**
     * Muestra la información de todos los
     * "estatus de juego de los partidos".
     */
    public function index(): void
    {
        $status = (new MatchStatusModel)->orderBy('description ASC')->findAll();
        $this->respond($status, 'Information about all the matches status');
    }

    /**
     * Muestra la información de un
     * "estatus de juego de los partidos".
     */
    public function show(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = MatchStatusValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The match status identifier is incorrect');
        }

        // Consulta la información del "estatus del partido".
        $matchStatus = new MatchStatusModel;
        $matchStatus->find($id);

        // Comprueba si existe el "status del partido".
        if (! $matchStatus->isHydrated()) {
            $this->respondNotFound('The match status information was not found');
        }

        $this->respond($matchStatus, 'Information about the match status');

    }
}
