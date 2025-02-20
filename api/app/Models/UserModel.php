<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo que representa la tabla
 * de los "usuarios de acceso".
 */
class UserModel extends BaseModel
{
    protected array $relations = [
        'role' => [self::BELONGS_TO, RoleModel::class, 'role_id'],
        'apiKey' => [self::HAS_ONE, ApiKeyModel::class, 'user_id'],
    ];

    public function getTableName(): string
    {
        return 'users';
    }
}
