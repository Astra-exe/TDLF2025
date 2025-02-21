<?php

namespace App\Validations;

use App\Models\RoleModel;

/**
 * Define las reglas de validación de los "usuarios de acceso".
 */
class UserValidation extends BaseValidation
{
    private static array $rolesIDs;

    public static function getAllRules(): array
    {
        return [
            'id' => ['guidv4'],
            'email' => ['valid_email', 'between_len' => [1, 128]],
            'username' => ['alpha_numeric_dash', 'between_len' => [1, 64]],
            'role_id' => ['guidv4', 'contains_list' => self::getRoles()],
            'fullname' => ['alpha_space', 'between_len' => [1, 128]],
            'password' => ['regex' => '/^\S+$/', 'between_len' => [8, 64]],
            'is_active' => ['boolean'],
        ];
    }

    public static function getAllFilters(): array
    {
        return [
            'email' => ['lower_case'],
            'is_active' => ['boolean'],
        ];
    }

    /**
     * Obtiene los IDs de los "roles de los usuarios de acceso".
     */
    private static function getRoles()
    {
        if (empty(self::$rolesIDs)) {
            $roles = (new RoleModel)->select('id')->findAll();

            self::$rolesIDs = array_column($roles, 'id');
        }

        return self::$rolesIDs;
    }
}
