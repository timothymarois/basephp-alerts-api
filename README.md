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



**Add New Alert:**

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
