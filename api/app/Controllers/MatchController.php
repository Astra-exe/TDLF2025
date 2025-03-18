<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\MatchModel;
use App\Validations\MatchValidation;

class MatchController extends BaseController
{
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
