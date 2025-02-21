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
     * Genera la API key de inicio de sesión.
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

        $user = new UserModel;
        $user->select('id, password')
            ->eq($identifyBy, $data['nickname'])
            ->eq('is_active', true)
            ->find();

        // Comprueba si el usuario que intenta autenticarse existe.
        if (! $user->isHydrated() || ! Password::verify($data['password'], $user->password)) {
            $this->respondUnauthorized('The access credentials are invalid');
        }

        // Elimina la antigua API key del usuario si existe.
        $user->apiKey->delete();

        $key = Auth::generateKey();

        // Registra la API key del usuario de acceso.
        $apiKey = new ApiKeyModel;
        $apiKey->copyFrom(['user_id' => $user->id, 'hash' => Auth::generateHash($key)]);
        $apiKey->insert();

        $this->respond(['api_key' => $key], 'API key authentication');
    }

    /**
     * Muestra la información del usuario autenticado.
     */
    public function me(): void
    {
        $this->respond($this->userAuth()->toArray(), 'Information about the authenticated user');
    }

    /**
     * Muestra la información de la API key del usuario autenticado.
     */
    public function check(): void
    {
        $apiKey = $this->userAuth()->apiKey;
        unset($apiKey->hash);

        $this->respond($apiKey->toArray(), 'Information about the API key');
    }

    public function refresh(): void {}

    public function logout(): void {}
}
