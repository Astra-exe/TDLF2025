<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\RegistrationCategoryModel;

class RegistrationCategoryController extends BaseController
{
    /**
     * Muestra la información de todas las
     * "categorías de inscripción de las parejas de jugadores".
     */
    public function index(): void
    {
        $categories = (new RegistrationCategoryModel)->orderBy('name ASC')->findAll();
        $this->respond($categories, "Information about all the categories of pair's players registration");
    }
}
