# Weather Service API, version 1

Every request needs the header X-API-Key. Send the key from your `.env` file
(`API_KEY`) as the `X-API-Key` request header. Without it, every endpoint
returns `401 unauthorized`.

Base path: /api/v1

## POST /weather/refresh

What it does:
Gets the current temperature for Iligan City (latitude 8.2280, longitude
124.2452) from the Open-Meteo weather source and saves it as a new row in
the `weather_logs` table. Uses POST because it saves data.

Success response:
HTTP 201 with the saved reading. `fetchedAt` is in UTC, which is 8 hours
behind Philippine time.

```json
{
    "status": 201,
    "data": {
        "id": 5,
        "city": "Iligan City",
        "temperatureC": 27.6,
        "fetchedAt": "2026-10-11T05:25:53"
    }
}
```

Errors:
- `401 unauthorized` — missing or wrong API key.
- `502 upstream_error` — the weather source is unreachable, or no
  temperature was received. Nothing is saved.

## GET /weather/logs

What it does:
Returns saved readings, newest first. Only reads data, so calling it again
is always safe.

Options:
- `limit` (optional, default `10`) — a whole number from 1 to 50. Controls
  how many readings are returned.
- `format` (optional, default `json`) — `json` or `xml`. Use `xml` to get a
  `weatherReport` document that is checked against
  `app/Schemas/weather-report.xsd` before it is sent.

Success response:
HTTP 200. JSON by default:

```json
{
    "status": 200,
    "data": [
        {
            "id": 6,
            "city": "Iligan City",
            "temperatureC": 27.6,
            "fetchedAt": "2026-10-11T05:25:55"
        },
        {
            "id": 5,
            "city": "Iligan City",
            "temperatureC": 27.6,
            "fetchedAt": "2026-10-11T05:25:53"
        }
    ]
}
```

With `?limit=2&format=xml`:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<weatherReport>
  <reading>
    <id>6</id>
    <city>Iligan City</city>
    <temperatureC>27.6</temperatureC>
    <fetchedAt>2026-10-11T05:25:55</fetchedAt>
  </reading>
  <reading>
    <id>5</id>
    <city>Iligan City</city>
    <temperatureC>27.6</temperatureC>
    <fetchedAt>2026-10-11T05:25:53</fetchedAt>
  </reading>
</weatherReport>
```

Errors:
- `401 unauthorized` — missing or wrong API key.
- `422 invalid_limit` — `limit` is not a whole number from 1 to 50.
- `422 invalid_format` — `format` is not `json` or `xml`.
- `500 invalid_xml` — the built XML did not match the schema.

## GET /weather/logs/{id}

What it does:
Returns one saved reading by its id. Only reads data.

Success response:
HTTP 200. Example for `/api/v1/weather/logs/1`:

```json
{
    "status": 200,
    "data": {
        "id": 1,
        "city": "Iligan City",
        "temperatureC": 31,
        "fetchedAt": "2026-09-30T06:03:10"
    }
}
```

Errors:
- `401 unauthorized` — missing or wrong API key.
- `404 not_found` — no weather log with that id.
