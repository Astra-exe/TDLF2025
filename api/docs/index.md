# 🍓 Documentación de la API

Documentación de la API RESTful del evento de frontenis *"Torneo de las Fresas Irapuato 2025"*.

## Respuestas

Cuerpo de la petición:

| Campo | Tipo | Descripción |
| ----- | ---- | ----------- |
| `data` | `object` `array[objects]` | Información o recursos de respuesta de la petición. |
| `status` | `integer` | Código HTTP de respuesta de la petición. |
| `description` | `string` | Descripción de la información o recursos de respuesta de la petición. |
| `pagination` | `object` | Información de la paginación de los recursos de la respuesta de la petición. |

Paginación:

| Campo | Tipo | Descripción |
| ----- | ---- | ----------- |
| `page` | `integer` | Número de la página actual de los resultados. |
| `limit` | `integer` | Número de resultados por página. |
| `total` | `integer` | Número total de páginas de los resultados. |
| `count` | `integer` | Número total de resultados. |
| `offset` | `integer` | Apuntador del resultado actual de la página. |

## Errores

Cuerpo de la petición:

| Campo | Tipo | Descripción |
| ----- | ---- | ----------- |
| `data` | `null` | Sin información o recursos de respuesta de la petición. |
| `status` | `integer` | Código HTTP de respuesta de la petición. |
| `validations` | `array[fields]` | Una lista de errores de validación de los campos del cuerpo de la petición. |
| `error` | `string` | Tipo de error de respuesta de la petición. |
| `description` | `string` | Descripción o motivo del error de respuesta de la petición. |
