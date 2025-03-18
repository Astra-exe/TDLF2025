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
    abstract protected function app(): Engine;

    /**
     * Genera una respuesta genérica.
     */
    protected function respond(mixed $data, string $description, ?int $status = null): void
    {
        $status ??= Http::OK();

        $response = [
            'data' => $data,
            'status' => $status,
            ...$this->body,
            'description' => $description,
        ];

        $this->body = [];

        $this->app()->jsonHalt($response, $status);
    }

    /**
     * Genera una respuesta genérica ante fallos.
     */
    protected function respondFail(string $description, ?int $status, string $error): void
    {
        $status ??= Http::BAD_REQUEST();

        $this->body['error'] = $error;

        $this->respond(null, $description, $status);
    }

    /**
     * Genera una respuesta de errores de servidor.
     */
    protected function respondServerError(string $description, string $error = 'Internal Server Error'): void
    {
        $this->respondFail($description, Http::INTERNAL_SERVER_ERROR(), $error);
    }

    /**
     * Genera una respuesta de errores de validación.
     */
    protected function respondValidationErrors(array $validations, string $description, string $error = 'Validation error'): void
    {
        $this->body['validations'] = $validations;

        $this->respondFail($description, Http::BAD_REQUEST(), $error);
    }

    /**
     * Genera una respuesta al crear un nuevo recurso.
     */
    protected function respondCreated(mixed $data, string $description): void
    {
        $this->respond($data, $description, Http::CREATED());
    }


    /**
     * Genera una respuesta de conflicto.
     */
    protected function respondConflict(string $description, string $error = 'Conflict'): void
    {
        $this->respondFail($description, Http::CONFLICT(), $error);
    }

    /**
     * Genera una respuesta cuando se intenta
     * crear un nuevo recurso que ya existe.
     */
    protected function respondResourceExists(string $description, string $error = 'Resource exists'): void
    {
        $this->respondConflict($description, $error);
    }

    /**
     * Genera una respuesta al modificar un recurso.
     */
    protected function respondUpdated(mixed $data, string $description): void
    {
        $this->respond($data, $description, Http::OK());
    }

    /**
     * Genera una respuesta al eliminar un recurso.
     */
    protected function respondDeleted(mixed $data, string $description): void
    {
        $this->respond($data, $description, Http::OK());
    }

    /**
     * Genera una respuesta al no encontrar un recurso.
     */
    protected function respondNotFound(string $description, string $error = 'Not Found'): void
    {
        $this->respondFail($description, Http::NOT_FOUND(), $error);
    }

    /**
     * Genera una respuesta cuando el cliente no tiene
     * las credenciales de acceso o son incorrectas.
     */
    protected function respondUnauthorized(string $description, string $error = 'Unauthorized'): void
    {
        $this->respondFail($description, Http::UNAUTHORIZED(), $error);
    }

    /**
     * Genera una respuesta cuando el cliente no tiene
     * los permisos adecuados para acceder a un recurso.
     */
    protected function respondForbidden(string $description, string $error = 'Forbidden'): void
    {
        $this->respondFail($description, Http::FORBIDDEN(), $error);
    }

    /**
     * Genera una respuesta exitosa sin enviar información al cliente.
     */
    protected function respondNoContent(string $description): void
    {
        // $this->respond(null, $description, Http::NO_CONTENT());
        $this->respond(null, $description);
    }

    /**
     * Genera una respuesta para paginación.
     */
    protected function respondPagination(mixed $data, mixed $pagination, string $description): void
    {
        $this->body['pagination'] = $pagination;

        $this->respond($data, $description, Http::OK());
    }

    public function respondDependecyError(string $description, string $error = 'Failed Dependency'): void
    {
        $this->respondFail($description, Http::FAILED_DEPENDENCY(), $error);
    }
}
