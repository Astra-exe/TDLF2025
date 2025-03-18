<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\MatchStatusModel;

class MatchStatusController extends BaseController
{
    /**
     * Muestra la información de todos los
     * "estatus de juego de los partidos".
     */
    public function index(): void
    {
        $status = (new MatchStatusModel)->orderBy('description ASC')->findAll();
        $this->respond($status, 'Information about all the matches status');
    }
}
