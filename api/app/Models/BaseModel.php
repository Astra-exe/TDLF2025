<?php

declare(strict_types=1);

namespace App\Models;

use App\Helpers\Database;
use flight\ActiveRecord;

/**
 * Clase base para todos los Modelos.
 */
abstract class BaseModel extends ActiveRecord
{
    /**
     * Método abstracto para obtener el nombre de la tabla.
     */
    abstract public function getTableName();

    public function __construct()
    {
        parent::__construct(Database::getConnection(), $this->getTableName());
    }
}
