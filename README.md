# BasePHP Alerts (API)
An API built on BasePHP framework to store and manage alert activity.

- [BasePHP Alerts SDK](https://github.com/timothymarois/basephp-alerts-sdk)


## Results

```JSON
{
  "errors": "false",
  "message": "",
  "runtime": "0.0109",
  "version": "v1",
  "results": []
}
```


## Alert (Endpoints)

```
// getting all alerts
GET /v1/alerts

// getting a single alert
GET /v1/alerts/{handle}

// add a new alert (requires params)
POST /v1/alerts

// edit an existing alert (requires params)
POST /v1/alerts/{handle}

// delete an alert
POST /v1/alerts/delete/{handle}
```

**Alert Parameters**

|Parameters        |Description              |
|---	           |---                      |
|`handle`          | Unique Alert Identifier |
|`description`     | Description of alert    |


## Activity (Endpoints)

```
// get all alert activity
GET /v1/activity/{handle}

// get a single activity record
GET /v1/activity/{id}

// add a new activity record (requires params)
POST /v1/activity/{handle}

// delete a activity record
POST /v1/activity/delete/{id}

// dismiss an activity record
POST /v1/activity/dismiss/{id}

// dismiss all activity records on alert
POST /v1/activity/dismiss/{handle}
```

**Activity Parameters**

|Parameters        |Description                          |
|---	           |---                                  |
|`type`            | `WARN`, `CRITICAL`, `UPDATE`        |
|`group`           | Group this activity with a label    |
|`message`         | Description of this activity        |
|`level`           | `NONE`, `LOW`, `URGENT`             |

**Activity Filter**

|Parameters        |Description              |
|---	           |---                      |
|`dismissed`       | `0` or `1`              |
