<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla
 * de los "roles de los usuarios de acceso".
 */
class RoleModel extends BaseModel
{
    protected array $relations = [
        'users' => [self::HAS_MANY, UserModel::class, 'role_id'],
    ];

    public function getTableName(): string
    {
        return 'roles';
    }
}
