<?php

declare(strict_types=1);

namespace App\Controllers;

use Throwable;

class ApiController extends BaseController
{
    public function welcome(): void
    {
        $this->respond([
            'name' => 'API RESTful del evento de frontenis "Torneo de las Fresas Irapuato 2025"',
            'documentation' => 'https://astra-exe.github.io/TDLF2025/api/',
            'repository' => 'https://github.com/Astra-exe/TDLF2025',
            'license' => 'AGPL-3.0-or-later',
            'authors' => [
                [
                    'fullname' => 'Ricardo García Jiménez',
                    'email' => 'ricardogj08@riseup.net',
                    'linkedin' => 'https://www.linkedin.com/in/ricardogj08/',
                    'repository' => 'https://notabug.org/ricardogj08/',
                    'role' => 'Backend developer',
                ],
                [
                    'fullname' => 'Francisco Javier Solís Martínez',
                    'email' => 'franciscosolism08@gmail.com',
                    'linkedin' => 'https://www.linkedin.com/in/francisco-js/',
                    'repository' => 'https://github.com/francisco-solis99',
                    'role' => 'Frontend developer',
                ],
                [
                    'fullname' => 'Juan José Ramírez López',
                    'email' => 'juan.ramirez.j99@gmail.com',
                    'linkedin' => 'https://www.linkedin.com/in/juan-rl/',
                    'repository' => 'https://github.com/Astra-exe/',
                    'role' => 'Data analyst',
                ],
            ],
        ], 'Information about the API RESTful');
    }

    /**
     * Respuestas para endpoint que no existen.
     */
    public function notFound(): void
    {
        $this->respondNotFound('The endpoint was not found');
    }

    /**
     * Respuestas de errores.
     */
    public function errors(Throwable $error): void
    {
        $this->respondServerError($error->getTraceAsString());
    }
}
