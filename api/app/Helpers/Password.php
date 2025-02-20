<?php

declare(strict_types=1);

namespace App\Helpers;

/**
 * Colección de herramientas
 * para contraseñas.
 */
class Password
{
    private const ALGORITHM = PASSWORD_DEFAULT;

    private const OPTIONS = ['cost' => 12];

    /**
     * Encripta una contraseña.
     */
    public static function encrypt(string $password): string
    {
        return password_hash($password, self::ALGORITHM, self::OPTIONS);
    }

    /**
     * Comprueba si una contraseña es autentica.
     */
    public static function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
