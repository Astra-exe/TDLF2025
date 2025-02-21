<?php

declare(strict_types=1);

namespace App\Middlewares;

use App\Helpers\Auth;
use App\Models\UserModel;
use App\Traits\ResponseTrait;
use flight\Engine;
use GUMP;

/**
 * Clase base para todos los Middlewares.
 */
abstract class BaseMiddleware
{
    use ResponseTrait;

    private Engine $app;

    /**
     * Método abstracto que se ejecuta antes de procesar una ruta.
     */
    abstract public function before(array $params): void;

    /**
     * Método abstracto que se ejecuta después de procesar una ruta.
     */
    abstract public function after(array $params): void;

    /**
     * Constructor de la clase.
     */
    public function __construct(Engine $app)
    {
        $this->app = $app;
    }

    /**
     * Obtiene la instancia de la aplicación.
     */
    protected function app(): Engine
    {
        return $this->app;
    }

    /**
     * Obtiene la instancia de las validaciones.
     */
    protected function gump(): GUMP
    {
        return $this->app()->gump();
    }

    /**
     * Obtiene la información del usuario autenticado.
     */
    protected function userAuth(): ?UserModel
    {
        return $this->app()->get(Auth::VARNAME);
    }
}
