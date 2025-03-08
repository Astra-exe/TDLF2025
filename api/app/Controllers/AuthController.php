<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\Auth;
use App\Helpers\Password;
use App\Models\ApiKeyModel;
use App\Models\UserModel;
use App\Validations\UserValidation;

class AuthController extends BaseController
{
    /**
     * Genera la "API key" de inicio de sesión.
     */
    public function login(): void
    {
        // Define los campos necesarios de la petición.
        $requestFields = ['nickname', 'password'];

        $data = [];

        // Obtiene solo los campos necesarios.
        foreach ($requestFields as $field) {
            $data[$field] = $this->app()->request()->data->{$field} ?? null;
        }

        // Define los campos necesarios del "usuario de acceso".
        $userFields = ['password'];

        // Modo de autenticación por defecto.
        $identifyBy = 'username';

        // Comprueba el modo de autenticación.
        if ($this->gump()->is_valid($data, ['nickname' => 'required|valid_email']) === true) {
            $identifyBy = 'email';
        }

        $userFields[] = $identifyBy;

        // Obtiene las reglas de validación.
        $rules = UserValidation::getRules($userFields);

        $rules['nickname'] = $rules[$identifyBy];
        unset($rules[$identifyBy]);

        // Define todas las reglas de validación como obligatorias.
        foreach (array_keys($rules) as $rule) {
            array_unshift($rules[$rule], 'required');
        }

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Establece los filtros de validación.
        $this->gump()->filter_rules(UserValidation::getFilters($userFields));

        // Valida el cuerpo de la petición.
        $data = $this->gump()->run($data);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The access credentials information is incorrect');
        }

        // Consulta la información del "usuario de acceso" que intenta autenticarse.
        $user = new UserModel;
        $user->select('id, password')
            ->eq($identifyBy, $data['nickname'])
            ->eq('is_active', 1)
            ->find();

        // Comprueba si el "usuario de acceso" que intenta autenticarse existe.
        if (! $user->isHydrated() || ! Password::verify($data['password'], $user->password)) {
            $this->respondUnauthorized('The access credentials are invalid');
        }

        // Elimina la antigua "API key" del "usuario de acceso" si existe.
        $user->apiKey->delete();

        // Genera la key de autenticación.
        $key = Auth::generateKey();

        // Registra la "API key" del "usuario de acceso".
        $apiKey = new ApiKeyModel;
        $apiKey->copyFrom(['user_id' => $user->id, 'hash' => Auth::generateHash($key)]);
        $apiKey->insert();

        $this->respondCreated(['api_key' => $key], 'The API key was created successfully');
    }

    /**
     * Muestra la información del "usuario de acceso" autenticado.
     */
    public function me(): void
    {
        $this->userAuth()->setCustomData('role', $this->userAuth()->role);

        unset($this->userAuth()->role_id);

        $this->respond($this->userAuth(), 'Information about the authenticated user');
    }

    /**
     * Muestra la información de la "API key" del "usuario de acceso" autenticado.
     */
    public function check(): void
    {
        $this->respond($this->userAuth()->apiKey, 'Information about the API key');
    }

    /**
     * Regenera la "API key" del "usuario de acceso" autenticado.
     */
    public function refresh(): void
    {
        // Elimina la antigua API key del "usuario de acceso".
        $this->userAuth()->apiKey->delete();

        // Genera la nueva key de autenticación.
        $key = Auth::generateKey();

        // Regenera la API key del "usuario de acceso".
        $apiKey = new ApiKeyModel;
        $apiKey->copyFrom(['user_id' => $this->userAuth()->id, 'hash' => Auth::generateHash($key)]);
        $apiKey->insert();

        $this->respondCreated(['api_key' => $key], 'The API key was renewed successfully');
    }

    /**
     * Elimina la "API key" del "usuario de acceso" autenticado.
     */
    public function logout(): void
    {
        $this->userAuth()->apiKey->delete();
        $this->respondNoContent('The API key was finalized successfully');
    }
}
