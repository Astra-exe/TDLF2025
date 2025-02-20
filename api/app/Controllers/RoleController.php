<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\RoleModel;

class RoleController extends BaseController
{
    /**
     * Muestra la información de todos los
     * "roles de los usuarios de acceso".
     */
    public function index(): void
    {
        $roles = (new RoleModel)->orderBy('name ASC')->findAll();
        $this->respond($roles, 'Information about all access user roles');
    }
}
