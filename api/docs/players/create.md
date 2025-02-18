## Crear un jugador

Cuerpo de la petición:

| Propiedades | Tipo | Requerido | Rango | Descripción |
| ----------- | ---- | --------- | ----- | ----------- |
| `fullname` | `string` | `true` | `between_len: [1, 128]` | Nombre completo del jugador. |
| `city` | `string` | `true` | `between_len: [1, 128]` | Ciudad o localidad de origen del jugador. | 
| `weight` | `float` | `true` | `between_numeric: [20, 600]` | Peso en kilos del jugador. |
| `height` | `float` | `true` | `between_numeric: [0.5, 2.5]` | Estatura en metros del jugador. |
| `experience` | `integer` | `true` | `between_numeric: [0, 50]` | Tiempo en años que el jugador ha practicado el deporte. |
