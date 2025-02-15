<?php

declare(strict_types=1);

namespace App\Controllers;

class HomeController extends BaseController
{
    public function welcome(): void
    {
        $this->respond(null, 'API RESTful del Torneo de las Fresas Irapuato');
    }
}
