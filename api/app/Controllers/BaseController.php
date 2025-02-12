<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Traits\ResponseTrait;
use flight\Engine;

/**
 * Clase base para todos los Controladores.
 */
abstract class BaseController
{
    protected Engine $app;

    use ResponseTrait;

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
    protected function getApp(): Engine
    {
        return $this->app;
    }
}
