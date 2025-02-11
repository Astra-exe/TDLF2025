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
    private const CONFIG_FILENAME = 'database';

    private static PDO $connection;

    /**
     * Obtiene el DSN de origen de la conexión de la base de datos.
     */
    private static function getDsn(array $options): string
    {
        return sprintf('%s:host=%s;port=%u;dbname=%s;charset=%s',
            $options['driver'],
            $options['host'],
            $options['port'],
            $options['database'],
            $options['charset']);
    }

    /**
     * Establece la conexión con la base de datos.
     */
    private static function setConnection(): void
    {
        $options = Config::getFromFilename(self::CONFIG_FILENAME);

        self::$connection = new PDO(self::getDsn($options), $options['username'], $options['password'], $options['options']);
    }

    /**
     * Obtiene una sola conexión de la base de datos.
     */
    public static function getConnection(): PDO
    {
        if (empty(self::$connection)) {
            self::setConnection();
        }

        return self::$connection;
    }

    /**
     * Obtiene un UUID aleatorio.
     */
    public static function getUuid(): string
    {
        return \Infocyph\UID\UUID::v4();
    }
}
