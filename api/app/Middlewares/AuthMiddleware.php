<?php

declare(strict_types=1);

namespace App\Middlewares;

use App\Helpers\Auth;
use App\Helpers\Date;
use App\Models\ApiKeyModel;
use App\Validations\AuthValidation;

/**
 * Middleware que comprueba la "API key" de
 * autenticación del "usuario de acceso".
 */
class AuthMiddleware extends BaseMiddleware
{
    private const HEADER = 'X-API-KEY';

    public function before(array $params): void
    {
        // Obtiene la key del encabezado.
        $key = $this->app()->request()->header(self::HEADER);

        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = AuthValidation::getRules(['api_key']);
        array_unshift($rules['api_key'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Valida la key del encabezado.
        $this->gump()->run(['api_key' => $key]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The API key information is incorrect');
        }

        $hash = Auth::generateHash($key);

        // Consula la información de la API key del usuario.
        $apiKey = new ApiKeyModel;
        $apiKey->select('id', 'user_id', 'hash', 'expires_at')
            ->eq('hash', $hash)
            ->eq('is_revoked', 0)
            ->find();

        // Comprueba si el hash de la key es autentica.
        if (! $apiKey->isHydrated() || ! Auth::verity($hash, $apiKey->hash)) {
            $this->respondUnauthorized('The API key is invalid');
        }

        // Comprueba si la key está expirada.
        if (strtotime(Date::getCurrentDateTime()) > strtotime($apiKey->expires_at)) {
            $apiKey->delete();
            $this->respondUnauthorized('The API key is expired');
        }

        $userAuth = $apiKey->user;

        // Comprueba si el "usuario de acceso" autenticado está activo.
        if (empty($userAuth->is_active)) {
            $this->respondForbidden('The authenticated user is not active');
        }

        /**
         * Se pasa la variable "$this->app()->get('userAuth')"
         * a todos los Middlewares y Controladores
         * con la información del "usuario de acceso" autenticado.
         */
        $this->app()->set(Auth::getVarname(), $userAuth);
    }

    public function after(array $params): void {}
}
