# Firevel - Stackdriver log channel
Stackdriver log channel for [Laravel](https://www.laravel.com) compatible with Google App Engine.

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
