# Jugadores de una pareja

```
[GET] /v1/pairs/@id/players
```

Parámetros de la petición:

| Parámetros | Tipo | Requerido | Descripción |
| ---------- | ---- | --------- | ----------- |
| `id` | `string` | `true` | Identificador de la pareja. |

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/pairs/@id/players
```

Respuesta de la petición:

```json
{
  "data": [
    {
      "id": "22b9045c-438f-4231-be3f-e5361eda1f0b",
      "fullname": "Juan Ramírez López",
      "city": "Irapuato",
      "weight": "70.00",
      "height": "1.65",
      "experience": 0,
      "is_active": 1,
      "created_at": "2025-02-19 02:18:30",
      "updated_at": "2025-02-19 02:18:30"
    },
    {
      "id": "84677adb-7030-4b68-bc17-1397f2e11234",
      "fullname": "Ricardo García Jiménez",
      "city": "Salvatierra",
      "weight": "120.00",
      "height": "1.82",
      "experience": 0,
      "is_active": 1,
      "created_at": "2025-02-19 02:18:30",
      "updated_at": "2025-02-19 02:18:30"
    }
  ],
  "status": 200,
  "description": "Information about the pair players"
}
```
