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
    protected const LIMIT = 16;

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
        $self->updated_at = Date::getCurrentDateTime();
    }

    /**
     * Establece campos antes de modificarlos.
     */
    protected function beforeUpdate(self $self): void
    {
        $self->updated_at = Date::getCurrentDateTime();
    }

    /**
     * Establece la paginación de los resultados.
     */
    public function paginate(int $page, ?int $limit = null): self
    {
        $limit ??= self::LIMIT;

        // Obtiene el número total de registros.
        $copy = clone $this;
        $copy = $copy->select('COUNT(*) AS _count')->find();

        // Calcula el número total de páginas.
        $total = ceil($copy->_count / $limit);

        // Calcula la posición del registro donde inicia la paginación.
        $offset = ($page - 1) * $limit;

        // Establece la paginación.
        $this->limit($limit)->offset($offset);

        // Información de la paginación.
        $this->setCustomData('pagination', [
            'page' => $page,
            'limit' => $limit,
            'total' => $total,
            'count' => $copy->_count,
            'offset' => $offset,
        ]);

        return $this;
    }
}
