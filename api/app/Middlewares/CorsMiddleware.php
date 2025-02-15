<?php

declare(strict_types=1);

namespace App\Middlewares;

use JustSteveKing\StatusCode\Http;

/**
 * Middleware que habilita CORS.
 */
class CorsMiddleware extends BaseMiddleware
{
    public function before(array $params): void
    {
        $request = $this->app()->request();
        $response = $this->app()->response();

        if ($request->method === 'OPTIONS') {
            // Define los métodos HTTP permitidos.
            if (empty($request->getVar('HTTP_ACCESS_CONTROL_REQUEST_METHOD'))) {
                $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS, HEAD');
            }

            // Envía los encabezados en la respuesta.
            $response->status(Http::OK());
            $response->send();
            exit();
        }
    }

    public function after(array $params): void {}
}
