<?php

declare(strict_types=1);

namespace App\Middlewares;

use App\Traits\ResponseTrait;
use flight\Engine;

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
}
