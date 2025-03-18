<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\RoleModel;
use App\Validations\RoleValidation;

class RoleController extends BaseController
{
    /**
     * Muestra la información de todos los
     * "roles de los usuarios de acceso".
     */
    public function index(): void
    {
        $roles = (new RoleModel)->orderBy('description ASC')->findAll();
        $this->respond($roles, 'Information about all the access users roles');
    }

    /**
     * Muestra la información de un
     * "rol de usuario de acceso".
     */
    public function show(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = RoleValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The access user role identifier is incorrect');
        }

        // Consulta la información del "rol de usuario de acceso".
        $role = new RoleModel;
        $role->find($id);

        // Comprueba si existe el "rol de usuario de acceso".
        if (! $role->isHydrated()) {
            $this->respondNotFound('The access user role information was not found');
        }

        $this->respond($role, 'Information about the access user role');
    }
}
