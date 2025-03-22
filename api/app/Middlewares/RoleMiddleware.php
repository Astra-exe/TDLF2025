<?php

declare(strict_types=1);

namespace App\Middlewares;

/**
 * Middleware que comprueba el "rol"
 * del "usuario de acceso" autenticado.
 */
class RoleMiddleware extends BaseMiddleware
{
    public function before(array $params): void {}

    public function after(array $params): void {}
}
