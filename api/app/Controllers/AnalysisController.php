<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\Env;
use App\Models\PlayerModel;
use App\Models\RegistrationCategoryModel;
use App\Validations\PlayerValidation;
use App\Validations\RegistrationCategoryValidation;
use Httpful\Exception\ConnectionErrorException;
use Httpful\Request;

class AnalysisController extends BaseController
{
    private const ENV_VARNAME = 'APP_DATA_MODEL_URL';

    /**
     * Obtiene la url del modelo de datos.
     */
    private function getUrl(): string
    {
        return rtrim(Env::get(self::ENV_VARNAME), '/');
    }

    /**
     * Obtiene el "perfil" del "jugador".
     */
    public function profile(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = PlayerValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The player identifier is incorrect');
        }

        // Consulta la información del "jugador".
        $player = new PlayerModel;
        $player->select('id')->eq('id', $id)->find();

        // Comprueba si existe el "jugador".
        if (! $player->isHydrated()) {
            $this->respondNotFound('The player information was not found');
        }

        // Construye la url de la petición.
        $url = sprintf('%s/profile/%s', $this->getUrl(), $id);

        try {
            // Realiza la petición.
            $response = Request::get($url)->expectsJson()->send();
        } catch (ConnectionErrorException $e) {
            $this->respondServiceUnavailable($e->getMessage());
        }

        $this->respond($response->body ?? null, 'Information about the player profile');
    }

    /**
     * Obtiene el "mapa de calor" de los "jugadores".
     */
    public function heatmap(): void
    {
        // Construye la url de la petición.
        $url = sprintf('%s/map', $this->getUrl());

        try {
            // Realiza la petición.
            $response = Request::get($url)->expectsJson()->send();
        } catch (ConnectionErrorException $e) {
            $this->respondServiceUnavailable($e->getMessage());
        }

        $this->respond($response->body ?? null, 'Information about the heatmap players');
    }

    /**
     * Obtiene la gráfica de "paridad" de una "categoría de inscripción".
     */
    public function parity(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = RegistrationCategoryValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The registration category identifier is incorrect');
        }

        // Consulta la información de la "categoría de inscripción".
        $registrationCategory = new RegistrationCategoryModel;
        $registrationCategory->select('id')->eq('id', $id)->find();

        // Construye la url de la petición.
        $url = sprintf('%s/parity/%s', $this->getUrl(), $registrationCategory->id);

        try {
            // Realiza la petición.
            $response = Request::get($url)->expectsJson()->send();
        } catch (ConnectionErrorException $e) {
            $this->respondServiceUnavailable($e->getMessage());
        }

        $this->respond($response->body ?? null, 'Information about the registration category parity');
    }

    /**
     * Obtiene la gráfica de "sinergia" de una "categoría de inscripción".
     */
    public function synergy(string $id): void
    {
        // Obtiene las reglas de validación
        // y las establece como obligatorias.
        $rules = RegistrationCategoryValidation::getRules(['id']);
        array_unshift($rules['id'], 'required');

        // Establece las reglas de validación.
        $this->gump()->validation_rules($rules);

        // Comprueba los parámetros de la petición.
        $this->gump()->run(['id' => $id]);

        // Comprueba si existen errores de validación.
        if ($this->gump()->errors()) {
            $this->respondValidationErrors(
                $this->gump()->get_errors_array(),
                'The registration category identifier is incorrect');
        }

        // Consulta la información de la "categoría de inscripción".
        $registrationCategory = new RegistrationCategoryModel;
        $registrationCategory->select('id')->eq('id', $id)->find();

        // Construye la url de la petición.
        $url = sprintf('%s/sinergy/%s', $this->getUrl(), $registrationCategory->id);

        try {
            // Realiza la petición.
            $response = Request::get($url)->expectsJson()->send();
        } catch (ConnectionErrorException $e) {
            $this->respondServiceUnavailable($e->getMessage());
        }

        $this->respond($response->body ?? null, 'Information about the registration category synergy');
    }

    /**
     * Obtiene la gráfica de comparación de las "sinergias"
     * de las "categorías de inscripción".
     */
    public function compareSynergies(): void
    {
        // Construye la url de la petición.
        $url = sprintf('%s/sinergy_compare', $this->getUrl());

        try {
            // Realiza la petición.
            $response = Request::get($url)->expectsJson()->send();
        } catch (ConnectionErrorException $e) {
            $this->respondServiceUnavailable($e->getMessage());
        }

        $this->respond($response->body ?? null, 'Information about the synergies comparison');
    }

    /**
     * Obtiene la gráfica de comparación de los puntos realizados
     * en las "categorías de inscripción".
     */
    public function comparePoints(): void
    {
        // Construye la url de la petición.
        $url = sprintf('%s/points_compare', $this->getUrl());

        try {
            // Realiza la petición.
            $response = Request::get($url)->expectsJson()->send();
        } catch (ConnectionErrorException $e) {
            $this->respondServiceUnavailable($e->getMessage());
        }

        $this->respond($response->body ?? null, 'Information about the points comparison');
    }
}
