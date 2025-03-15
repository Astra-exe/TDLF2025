<?php

declare(strict_types=1);

namespace App\Controllers;

class ActionsController extends BaseController
{
    /**
     * Genera "grupos" para cada tipo de "categoría de inscripción"
     * y asigna las "parejas" de cada "categoría" a un "grupo" de manera aleatoria.
     *
     * Después de crearlos se generan todas las "partidos" posibles del mismo "grupo".
     */
    public function randomizeGroupsPairsMatches(): void
    {
        // Formato del nombre de la pareja.
        // Nombre: A1_2025, B1_2025, ..., A2_2025, B2_2025
        // Descripción: A, B, ..., A, B

    }
}
