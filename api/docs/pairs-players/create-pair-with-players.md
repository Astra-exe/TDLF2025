## Crear una pareja con jugadores

Cuerpo de la petición:

| Propiedades | Tipo | Requerido | Rango | Descripción |
| ----------- | ---- | --------- | ----- | ----------- |
| `category_registration_id` | `string` | `true` | `exact_len: 36` | Identificador de la categoría de inscripción de la pareja. |
| `players` | `array[players]` |  `true` | `array_size_equal: 2` | Una lista con la información de los jugadores de la pareja ([ver](../players/create.md)).
