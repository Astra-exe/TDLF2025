# API

Documentación de la API RESTful del evento "Torneo de las Fresas 2025".

## Respuestas

Cuerpo de la petición:

| Campo | Tipo | Descripción |
| ----- | ---- | ----------- |
| `data` | `object` `array[objects]` | Información o recursos de respuesta de la petición. |
| `status` | `integer` | Código HTTP de respuesta de la petición. |
| `description` | `string` | Descripción de la información o recursos de respuesta de la petición. |

## Errores

Cuerpo de la petición:

| Campo | Tipo | Descripción |
| ----- | ---- | ----------- |
| `data` | `null` | Sin información o recursos de respuesta de la petición. |
| `status` | `integer` | Código HTTP de respuesta de la petición. |
| `validations` | `array[fields]` | Una lista de errores de validación de los campos del cuerpo de la petición. |
| `error` | `string` | Tipo de error de respuesta de la petición. |
| `description` | `string` | Descripción o motivo del error de respuesta de la petición. |
