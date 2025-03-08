<?php

declare(strict_types=1);

namespace App\Models;

use App\Helpers\Auth;

/**
 * Modelo que representa la tabla
 * de las "API keys de los usuarios de acceso".
 */
class ApiKeyModel extends BaseModel
{
    protected array $relations = [
        'user' => [
            self::BELONGS_TO,
            UserModel::class,
            'user_id',
            ['select' => 'id, email, username, role_id, fullname, is_active, created_at, updated_at'],
        ],
    ];

    public function getTableName(): string
    {
        return 'api_keys';
    }

    protected function beforeInsert(BaseModel $self): void
    {
        parent::beforeInsert($self);

        $self->is_revoked = 0;
        $self->expires_at = Auth::getExpiration();
    }
}
