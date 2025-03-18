<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\MatchCategoryModel;

class MatchCategoryController extends BaseController
{
    /**
     * Muestra la información de todas las
     * "categorías de las rondas de los partidos".
     */
    public function index(): void
    {
        $categories = (new MatchCategoryModel)->orderBy('description ASC')->findAll();
        $this->respond($categories, 'Information about all the matches categories');
    }
}
