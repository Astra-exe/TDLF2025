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
        "experience": 0
      },
      {
        "fullname": "Juan Ramírez López",
        "city": "Irapuato",
        "weight": 70,
        "height": 1.65,
        "experience": 5
      }
    ]
  }'
```

Respuesta de la petición:

```json
{
    "data": {
        "id": "c453f7db-9606-4f2e-a335-619247389009",
        "registration_category_id": "59b675bb-4559-4748-8974-0753e716e8af",
        "is_eliminated": 0,
        "created_at": "2025-02-19 02:18:30",
        "updated_at": "2025-02-19 02:18:30"
    },
    "status": 201,
    "description": "The pair with the players was created successfully"
}
```
