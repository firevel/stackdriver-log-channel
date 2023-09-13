# Firevel - Stackdriver log channel
Stackdriver log channel for [Laravel](https://www.laravel.com) compatible with Google App Engine.

# This package is now DEPRECATED
Inside of Google Cloud you can send logs to Stackdriver without custom driver using env:
```
  LOG_CHANNEL=stderr
  LOG_STDERR_FORMATTER=Monolog\Formatter\GoogleCloudLoggingFormatter
```

# Installation
1) Install package with `composer require firevel/stackdriver-log-channel`

2) Add to `config/logging.php`:
```
        'stackdriver' => [
            'driver' => 'custom',
            'via' => Firevel\Stackdriver\CreateStackdriverLogger::class,
            'level' => 'debug',
        ],
```

3) Update your `app.yaml` with:
```
env_variables:
  LOG_CHANNEL: stackdriver
```
