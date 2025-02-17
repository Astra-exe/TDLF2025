<?php

declare(strict_types=1);

namespace App\Models;

use App\Helpers\Database;
use App\Helpers\Date;
use flight\ActiveRecord;

/**
 * Clase base para todos los Modelos.
 */
abstract class BaseModel extends ActiveRecord
{
    /**
     * Método abstracto para obtener el nombre de la tabla.
     */
    abstract public function getTableName(): string;

    public function __construct()
    {
        parent::__construct(Database::getConnection(), $this->getTableName());
    }

    /**
     * Establece campos antes de insertarlos.
     */
    protected function beforeInsert(self $self): void
    {
        $self->id = Database::getUuid();
        $self->created_at = Date::getCurrentDateTime();
    }

    /**
     * Establece campos antes de modificarlos.
     */
    protected function beforeUpdate(self $self): void
    {
        $self->updated_at = Date::getCurrentDateTime();
    }
}
