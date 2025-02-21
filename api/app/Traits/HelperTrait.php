<?php

declare(strict_types=1);

namespace App\Traits;

use App\Helpers\Auth;
use App\Models\UserModel;
use flight\Engine;
use GUMP;

/**
 * Extensión que agrega atajos cortos
 * para herramientas y ayudas en común.
 */
trait HelperTrait
{
    /**
     * Método abstractor para obtener una instancia
     * existente de la aplicación.
     */
    abstract protected function app(): Engine;

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
