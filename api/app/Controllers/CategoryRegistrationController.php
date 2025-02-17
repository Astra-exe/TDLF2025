<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\CategoryRegistrationModel;

class CategoryRegistrationController extends BaseController
{
    /**
     * Muestra la información de todas las "categorías de inscripción de las parejas de jugadores".
     */
    public function index(): void
    {
        $categories = (new CategoryRegistrationModel)->orderBy('name ASC')->findAll();
        $this->respond($categories, 'Information on all categories of registration players pairs');
    }
}
