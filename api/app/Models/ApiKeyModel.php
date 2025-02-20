<?php

declare(strict_types=1);

namespace App\Models;

use App\Helpers\ApiKey;

/**
 * Modelo que representa la tabla
 * de las "API keys de los usuarios de acceso".
 */
class ApiKeyModel extends BaseModel
{
    protected array $relations = [
        'user' => [self::BELONGS_TO, UserModel::class, 'user_id'],
    ];

    public function getTableName(): string
    {
        return 'api_keys';
    }

    protected function beforeInsert(BaseModel $self): void
    {
        parent::beforeInsert($self);

        $self->is_revoked = (int) false;
        $self->expires_at = ApiKey::getExpiration();
    }
}
