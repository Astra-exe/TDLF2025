<?php

declare(strict_types=1);

namespace App\Helpers;

use PDO;

/**
 * Colección de herramientas
 * para la base de datos.
 */
class Database
{
    private static self $instance;

    private const CONFIG_FILENAME = 'database';

    private array $options;

    private string $dsn;

    private PDO $connection;

    /**
     * Constructor de la clase.
     */
    private function __construct()
    {
        $this->options = Config::getFromFilename(self::CONFIG_FILENAME);
        $this->dsn = $this->generateDsn();
        $this->connection = $this->generateConnection();
    }

    /**
     * Crea una sola instancia de la clase.
     */
    public static function getInstance(): self
    {
        if (empty($instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Genera el DSN de origen de la conexión de la base de datos.
     */
    private function generateDsn(): string
    {
        return sprintf('%s:host=%s;port=%u;dbname=%s;charset=%s',
            $this->options['driver'],
            $this->options['host'],
            $this->options['port'],
            $this->options['database'],
            $this->options['charset']);
    }

    /**
     * Obtiene el DSN de origen de la conexión de la base de datos.
     */
    public function getDsn(): string
    {
        return $this->dsn;
    }

    /**
     * Genera la conexión de la base de datos.
     */
    private function generateConnection(): PDO
    {
        return new PDO($this->getDsn(), $this->options['username'], $this->options['password'], $this->options['options']);
    }

    /**
     * Obtiene la conexión de la base de datos.
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
