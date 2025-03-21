<?php

declare(strict_types=1);

namespace App\Models;

use App\Helpers\Password;

/**
 * Modelo que representa la tabla
 * de los "usuarios de acceso".
 */
class UserModel extends BaseModel
{
    protected array $relations = [
        'role' => [
            self::BELONGS_TO, RoleModel::class,
            'role_id',
            ['select' => ['id', 'name', 'description']],
        ],
        'apiKey' => [
            self::HAS_ONE, ApiKeyModel::class,
            'user_id',
            ['select' => ['id', 'user_id', 'is_revoked', 'expires_at', 'created_at', 'updated_at']],
        ],
    ];

    public function getTableName(): string
    {
        return 'users';
    }

    protected function beforeInsert(BaseModel $self): void
    {
        parent::beforeInsert($self);

        $self->password = Password::encrypt($self->password);
        $self->is_active = 1;
    }
}
