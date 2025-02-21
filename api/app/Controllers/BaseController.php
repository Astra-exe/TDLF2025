<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\UserModel;
use App\Traits\ResponseTrait;
use flight\Engine;
use GUMP;

/**
 * Clase base para todos los Controladores.
 */
abstract class BaseController
{
    use ResponseTrait;

    private Engine $app;

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
