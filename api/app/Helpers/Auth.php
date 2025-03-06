<?php

declare(strict_types=1);

namespace App\Helpers;

/**
 * Colección de herramientas
 * para la API key de autenticación.
 */
class Auth
{
    private const LENGTH = 32;

    private const ALGORITHM = 'sha512';

    private const ENV_VARNAME = 'APP_SECRET';

    private const EXPIRATION = '+8 minute';

    private const VARNAME = 'userAuth';

    /**
     * Genera una key de autenticación.
     */
    public static function generateKey(): string
    {
        return bin2hex(random_bytes(self::LENGTH));
    }

    /**
     * Obtiene la clave secreta compartida.
     */
    private static function getSecret(): string
    {
        return Env::get(self::ENV_VARNAME);
    }

    /**
     * Genera el hash de una key de autenticación.
     */
    public static function generateHash(string $key): string
    {
        return hash_hmac(self::ALGORITHM, $key, self::getSecret());
    }

    /**
     * Obtiene la fecha de expiración de la API Key.
     */
    public static function getExpiration(): string
    {
        return Date::strToDateTime(self::EXPIRATION);
    }

    /**
     * Comprueba si el hash de una key es autentica.
     */
    public static function verity(string $hash, string $original): bool
    {
        return hash_equals($hash, $original);
    }

    /**
     * Obtiene el nombre de la variable de autenticación.
     */
    public static function getVarname(): string
    {
        return self::VARNAME;
    }
}
