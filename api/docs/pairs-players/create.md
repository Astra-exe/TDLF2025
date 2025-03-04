# Crear una pareja con jugadores

```
[POST] /v1/players/pairs
```

Cuerpo de la petición:

| Propiedades | Tipo | Requerido | Rango | Descripción |
| ----------- | ---- | --------- | ----- | ----------- |
| `registration_category_id` | `string` | `true` | `exact_len: 36` | Identificador de la categoría de inscripción de la pareja ([ver](../registration-categories/index.md)). |
| `players` | `array[players]` |  `true` | `array_size_equal: 2` | Una lista con la información de los jugadores de la pareja ([ver](../players/create.md)).

Ejemplo:

```bash
curl -X POST \
  -H 'Content-Type: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/pairs/players \
  -d '{
    "registration_category_id": "59b675bb-4559-4748-8974-0753e716e8af",
    "players": [
      {
        "fullname": "Ricardo García Jiménez",
        "city": "Salvatierra",
        "weight": 120,
        "height": 1.82,
        "age": 26,
        "experience": 0
      },
      {
        "fullname": "Juan José Ramírez López",
        "city": "Irapuato",
        "weight": 70,
        "height": 1.65,
        "age": 25,
        "experience": 5
      }
    ]
  }'
```

Respuesta de la petición:

```json
{
  "data": {
    "id": "8636016a-1242-470d-a34f-49534f5ec22c",
    "registration_category_id": "ecaead17-4b03-4aac-9610-707f7a06bef3",
    "is_eliminated": 0,
    "created_at": "2025-02-28 13:09:49",
    "updated_at": "2025-02-28 13:09:49"
  },
  "status": 201,
  "description": "The pair with the players was created successfully"
}
```
