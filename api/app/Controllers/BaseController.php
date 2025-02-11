<?php

declare(strict_types=1);

namespace App\Controllers;

use flight\Engine;

/**
 * Clase base para todos los Controladores.
 */
abstract class BaseController
{
    protected Engine $app;

    public function __constructor(Engine $app)
    {
        $this->app = $app;
    }
}
