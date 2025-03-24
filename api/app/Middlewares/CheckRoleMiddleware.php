<?php

declare(strict_types=1);

namespace App\Middlewares;

/**
 * Middleware que comprueba el "rol" del "usuario de acceso" autenticado.
 */
class CheckRoleMiddleware extends BaseMiddleware
{
    private const ROLES = ['admin', 'web', 'reader', 'judge'];

    public function before(array $params): void
    {
        foreach (self::ROLES as $role) {
            if ($this->userAuth()->role->name === $role) {
                return;
            }
        }

        $this->respondForbidden('The authenticated user does not have a valid role');
    }

    public function after(array $params): void {}
}
