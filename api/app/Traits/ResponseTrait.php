<?php

declare(strict_types=1);

namespace App\Traits;

use flight\Engine;
use JustSteveKing\StatusCode\Http;

/**
 * Extensión para realizar respuestas HTTP simples.
 */
trait ResponseTrait
{
    private array $body = [];

    /**
     * Método abstractor para obtener una instancia
     * existente de la aplicación.
     */
    abstract protected function getApp(): Engine;

    /**
     * Genera una respuesta genérica.
     */
    protected function respond(?array $data, string $description, ?int $status = null): void
    {
        $status ??= Http::OK();

        $response = array_merge($this->body, [
            'data' => $data,
            'status' => $status,
            'description' => $description,
        ]);

        $this->body = [];

        $this->getApp()->json($response, $status);
    }

    /**
     * Genera una respuesta genérica ante fallos.
     */
    protected function respondFail(string $error, string $description, ?int $status = null): void
    {
        $status ??= Http::BAD_REQUEST();

        $this->body['error'] = $error;

        $this->respond(null, $description, $status);
    }

    /**
     * Genera una respuesta de errores de servidor.
     */
    protected function respondServerError(string $error, string $description): void
    {
        $this->respondFail($error, $description, Http::INTERNAL_SERVER_ERROR());
    }

    /**
     * Genera una respuesta de errores de validación.
     */
    protected function respondValidationErrors(array $validations, string $error, string $description): void
    {
        $this->payload['validations'] = $validations;

        $this->respondFail($error, $description, Http::BAD_REQUEST());
    }

    /**
     * Genera una respuesta al crear un nuevo recurso.
     */
    protected function respondCreated(array $data, string $description): void
    {
        $this->respond($data, $description, Http::CREATED());
    }

    /**
     * Genera una respuesta cuando se intenta
     * crear un nuevo que ya existe.
     */
    protected function respondResourceExists(string $error, string $description): void
    {
        $this->respondFail($error, $description, Http::CONFLICT());
    }

    /**
     * Genera una respuesta al modificar un recurso.
     */
    protected function respondUpdated(array $data, string $description): void
    {
        $this->respond($data, $description, Http::OK());
    }

    /**
     * Genera una respuesta al eliminar un recurso.
     */
    protected function respondDeleted(array $data, string $description): void
    {
        $this->respond($data, $description, Http::OK());
    }

    /**
     * Genera una respuesta al no encontrar un recurso.
     */
    protected function respondNotFound(string $error, string $description): void
    {
        $this->respondFail($error, $description, Http::NOT_FOUND());
    }

    /**
     * Genera una respuesta cuando el cliente no tiene
     * credenciales de acceso o son incorrectas.
     */
    protected function respondUnauthorized(string $error, string $description): void
    {
        $this->respondFail($error, $description, Http::UNAUTHORIZED());
    }

    /**
     * Genera una respuesta cuando el cliente no tiene
     * los permisos adecuados para acceder a un recurso.
     */
    protected function respondForbidden(string $error, string $description): void
    {
        $this->respondFail($error, $description, Http::FORBIDDEN());
    }

    /**
     * Genera una respuesta exitosa sin enviar información al cliente.
     */
    protected function respondNoContent(string $description): void
    {
        $this->respond(null, $description, Http::NO_CONTENT());
    }
}
