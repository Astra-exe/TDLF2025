<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\CategoryPairModel;

class CategoryPairController extends BaseController
{
    /**
     * Muestra la información de todas las "categorías de las parejas de jugadores".
     */
    public function index(): void
    {
        $categories = (new CategoryPairModel)->orderBy('name ASC')->findAll();
        $this->respond($categories, 'Information on all categories of players pairs');
    }
}
