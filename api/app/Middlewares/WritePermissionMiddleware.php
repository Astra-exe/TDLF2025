<?php

declare(strict_types=1);

namespace App\Middlewares;

/**
 * Middleware que comprueba que el "usuario de acceso" autenticado
 * tenga permisos de escritura (crear, editar, eliminar).
 */
class WritePermissionMiddleware extends BaseMiddleware
{
    private const ROLES = ['admin', 'judge'];

    public function before(array $params): void
    {
        foreach (self::ROLES as $role) {
            if ($this->userAuth()->role->name === $role) {
                return;
            }
        }

        $this->respondForbidden('The authenticated user does not have write permissions');
    }

    public function after(array $params): void {}
}
