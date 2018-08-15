> **Note:** This repository requires the use of the BasePHP framework. If you would like to learn more about the framework, visit [BasePHP](https://github.com/basephp/framework).

# BasePHP Alerts (API)
An API built on BasePHP framework to store and manage alerts.

- [BasePHP Alerts SDK](https://github.com/timothymarois/basephp-alerts-sdk)


## API (ALERTS)
Using the following endpoints for `Alerts` using the `BaseAlert` database table.


**Get All Alerts:**

```
GET /v1/alerts
```



**Get Alert:**

```
GET /v1/alerts/{handle}
```



**Add Alert:**

```
POST /v1/alerts
```

|Parameters        |Description              |
|---	           |---                      |
|`handle`          | Unique Alert Identifier |
|`description`     | Description of alert    |



**Delete Alert:**

```
POST /v1/alerts/delete/{handle}
```



**Edit Existing Alert:**

```
POST /v1/alerts/{handle}
```

|Parameters        |Description              |
|---	           |---                      |
|`handle`          | Unique Alert Identifier |
|`description`     | Description of alert    |






## API (ALERT ACTIVITY)
Using the following endpoints for `Activity` using the `BaseActivity` database table.


**Get All Activity:**

The `handle` is a reference to your specific Alert Handle.

```
GET /v1/activity/{handle}
```



**Get Alert:**

Using the `id` of the specific activity record.

```
GET /v1/activity/{id}
```



**Add Activity Record:**

The `handle` is a reference to your specific Alert Handle.

```
POST /v1/activity/{handle}
```

|Parameters        |Description              |
|---	           |---                      |
|`type`            | `WARN`, `CRITICAL`, `NOTICE` |
|`group`           | Group this activity with a label    |
|`message`         | Description of this activity  |
|`level`           | `LOW`, `URGENT`         |


**Delete a Activity Record:**

Using the `id` of the specific activity record.

```
POST /v1/activity/delete/{id}
```



**Dismiss Activity Record:**

Using the `id` of the specific activity record. Dismissing only a single record.

```
POST /v1/activity/dismiss/{id}
```



**Dismiss All Activity Records:**

The `handle` is a reference to your specific Alert Handle. This will dismiss ALL records on this alert.

```
POST /v1/activity/dismiss/{handle}
```
