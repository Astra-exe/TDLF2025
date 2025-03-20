# Perfil de un jugador

```
[GET] /v1/analysis/profiles/@id
```

Parámetros de la ruta:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador del jugador. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/llm/profiles/@id
```

Respuesta de la petición:

```json
{
  "data": {
    "position": "Delantero. Aprovecha tu velocidad.",
    "priority": "Priorizar la técnica de golpe y desplazamientos (visión de juego).",
    "workout": "Mejora tu agilidad con ejercicios de reacción. Usa golpes cortos y cambios de dirección para desequilibrio."
  },
  "status": 200,
  "description": "Information about the player profile"
}
```
