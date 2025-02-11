<?php

declare(strict_types=1);

namespace App\Controllers;

class HomeController extends BaseController
{
    public function welcome()
    {
        echo 'Hola mundo!';
    }
}
