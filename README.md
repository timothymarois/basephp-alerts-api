> **Note:** This repository requires the use of the BasePHP framework. If you would like to learn more about the framework, visit [BasePHP](https://github.com/basephp/framework).

# BasePHP Alerts (API)
An API built on BasePHP framework to store and manage alerts.

- [BasePHP Alerts SDK](https://github.com/timothymarois/basephp-alerts-sdk)


## API (ALERTS)


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


## API (ALERT ACTIVITY)

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

|Parameters        |Description              |
|---	           |---                      |
|`type`            | `WARN`, `CRITICAL`, `NOTICE` |
|`group`           | Group this activity with a label    |
|`message`         | Description of this activity  |
|`level`           | `LOW`, `URGENT`         |
