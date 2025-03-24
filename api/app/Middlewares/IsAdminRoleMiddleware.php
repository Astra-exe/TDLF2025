<?php

declare(strict_types=1);

namespace App\Middlewares;

/**
 * Middleware que comprueba que el "rol"
 * del "usuario de acceso" autenticado
 * sea administrador.
 */
class IsAdminRoleMiddleware extends BaseMiddleware
{
    public function before(array $params): void
    {
        if ($this->userAuth()->role->name !== 'admin') {
            $this->respondForbidden('The authenticated user is not administrator');
        }
    }

    public function after(array $params): void {}
}
