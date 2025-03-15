<?php

declare(strict_types=1);

namespace App\Controllers;

class HomeController extends BaseController
{
    public function welcome(): void
    {
        $this->respond([
            'title' => 'API RESTful del evento de frontenis "Torneo de las Fresas Irapuato 2025"',
            'documentation' => 'https://astra-exe.github.io/TDLF2025/api/',
        ], 'Information about the API RESTful');
    }
}
