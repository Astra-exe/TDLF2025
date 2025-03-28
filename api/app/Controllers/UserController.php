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
    public function index(): void
    {
        // Define los query params de la petición.
        $queryFields = [
            'page' => 1,
            'search' => '',
            'filterBy' => 'fullname',
            'orderBy' => 'created_at',
            'sortBy' => 'desc',
            'role_id' => null,
            'is_active' => null,
        ];

        $queryParams = [];

        // Obtiene solo los query params necesarios.
        foreach ($queryFields as $param => $default) {
            $queryParams[$param] = $this->app()->request()->query->{$param} ?? $default;

            if (is_string($queryParams[$param]) && empty($queryParams[$param])) {
                $queryParams[$param] = $default;
            }

            if (is_null($queryParams[$param])) {
                unset($queryParams[$param]);
            }
        }

        $queryNames = array_keys($queryFields);

        // Obtiene y establece las reglas de validación.
        $this->gump()->validation_rules(UserValidation::getRules($queryNames));

        // Obtiene y establece los filtros de validación.
        $this->gump()->filter_rules(UserValidation::getFilters($queryNames));

        // Comprueba los query params de la petición.
        $queryParams = $this->gump()->run($queryParams);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The users search information is incorrect');
        }

        // Consulta la información de todos los "usuarios" con paginación.
        $users = new UserModel;
        $users->select(...$this->getColumns())
            ->like($queryParams['filterBy'], sprintf('%%%s%%', $queryParams['search']));

        // Filtra los "usuarios" por estatus de actividad.
        if (isset($queryParams['is_active'])) {
            $users->eq('is_active', $queryParams['is_active']);
        }

        // Obtiene la información sobre la paginación.
        $users->paginate($queryParams['page']);
        $pagination = $users->pagination;

        // Aplica los parámetros de ordenamiento.
        $users->orderBy(sprintf('%s %s', $queryParams['orderBy'], $queryParams['sortBy']));

        $this->respondPagination($users->findAll(), $pagination, 'Information about all the users with pagination');
    }

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

        // Obtiene la información del nuevo "usuario".
        $user->reset();
        $user->select(...$this->getColumns())->eq('id', $id)->find();

        // Consulta el "rol" del "usuario".
        $user->setCustomData('role', $user->role);
        unset($user->role_id);

        $this->respondCreated($user, 'The user was created successfully');
    }

    /**
     * Muestra la información de un "usuario".
     */
    public function show(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = UserValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The user identifier is incorrect');
        }

        // Consulta la información del "usuario".
        $user = new UserModel;
        $user->select(...$this->getColumns())->eq('id', $id)->find();

        // Comprueba si existe el "usuario".
        if (! $user->isHydrated()) {
            $this->respondNotFound('The user information was not found');
        }

        // Consulta el "rol" del "usuario".
        $user->setCustomData('role', $user->role);
        unset($user->role_id);

        $this->respond($user, 'Information about the user');
    }

    /**
     * Modifica la información de un "usuario".
     */
    public function update(string $id): void
    {
        // Define los campos que se pueden modificar.
        $fields = ['email', 'username', 'role_id', 'fullname', 'password', 'password_confirm'];

        $data = ['id' => $id];

        // Obtiene solo los campos necesarios.
        foreach ($fields as $field) {
            $data[$field] = $this->app()->request()->data->{$field} ?? null;

            if (is_null($data[$field])) {
                unset($data[$field]);
            }
        }

        $fieldNames = array_keys($data);

        // Obtiene las reglas de validación
        // y establece el identificador como obligatorio.
        $rules = UserValidation::getRules(['id', ...$fieldNames]);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Establece los filtros de validación.
        $this->gump()->filter_rules(UserValidation::getFilters($fieldNames));

        // Valida el cuerpo de la petición.
        $data = $this->gump()->run($data);

        foreach (['id', 'password_confirm'] as $field) {
            unset($data[$field]);
        }

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

        // Consulta la información del "usuario".
        $user->select('id')->eq('id', $id)->find();

        // Comprueba si existe el "usuario".
        if (! $user->isHydrated()) {
            $this->respondNotFound('The user information was not found');
        }

        // Modifica la información del "usuario".
        if (! empty($data)) {
            $user->copyFrom($data);
            $user->update();
            $user->reset();
        }

        // Consulta la información actualizada del "usuario".
        $user->find($id);

        // Consulta el "rol" del "usuario".
        $user->setCustomData('role', $user->role);
        unset($user->role_id);

        $this->respondUpdated($user, 'The user was updated successfully');
    }

    /**
     * Elimina la información de un "usuario".
     */
    public function delete(string $id): void {}
}
