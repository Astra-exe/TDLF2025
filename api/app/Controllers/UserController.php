<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\UserModel;
use App\Validations\UserValidation;

class UserController extends BaseController
{
    /**
     * Obtiene las columnas visibles del "usuario".
     */
    private function getColumns(): array
    {
        return ['id', 'email', 'username', 'role_id', 'fullname', 'is_active', 'created_at', 'updated_at'];
    }

    /**
     * Muestra la información de todos los "usuarios".
     */
    public function index(): void {}

    /**
     * Registra la información de un "usuario".
     */
    public function create(): void
    {
        // Define los campos necesarios de la petición.
        $fields = ['email', 'username', 'role_id', 'fullname', 'password', 'password_confirm'];

        $data = [];

        // Obtiene solo los campos necesarios.
        foreach ($fields as $field) {
            $data[$field] = $this->app()->request()->data->{$field} ?? null;
        }

        // Obtiene las reglas de validación.
        $rules = UserValidation::getRules($fields);

        // Define todas las reglas de validación como obligatorias.
        foreach (array_keys($rules) as $rule) {
            array_unshift($rules[$rule], 'required');
        }

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Establece los filtros de validación.
        $this->gump()->filter_rules(UserValidation::getFilters($fields));

        // Valida el cuerpo de la petición.
        $data = $this->gump()->run($data);

        unset($data['password_confirm']);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The user information is incorrect');
        }

        $user = new UserModel;

        // Comprueba que los valores de las columnas sean únicos.
        foreach (['username', 'email'] as $column) {
            $user->select('id')->eq($column, $data[$column])->find();

            if ($user->isHydrated()) {
                $this->respondResourceExists(
                    [$column => 'The '.$column.' field must be unique'],
                    'The user information is incorrect');
            }

            $user->reset();
        }

        // Registra la información del "usuario".
        $user->copyFrom($data);
        $user->insert();

        // Obtiene el ID del nuevo "usuario".
        $id = $user->id;
        $user->reset();
        $user->select(...$this->getColumns())->find($id);

        $user->setCustomData('role', $user->role);

        unset($user->role_id);

        $this->respondCreated($user, 'The user was created successfully');
    }

    /**
     * Muestra la información de un "usuario".
     */
    public function show(string $id): void {}

    /**
     * Modifica la información de un "usuario".
     */
    public function update(string $id): void {}

    /**
     * Elimina la información de un "usuario".
     */
    public function delete(string $id): void {}
}
