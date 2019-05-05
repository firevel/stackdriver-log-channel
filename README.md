# Firevel - Stackdriver log channel
Stackdriver log channel for [Laravel](https://www.laravel.com) and [Firevel](https://www.firevel.com) compatible with Google App Engine standard environment (PHP 7.2).

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

3) Replace `report` method in `App\Exceptions\Handler` with:
```
    /**
     * Google Cloud Stackdriver Error Reporting.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        if (env('GAE_SERVICE')) {
            \Firevel\Stackdriver\StackdriverExceptionHandler::handle($exception);
        } else {
            parent::report($exception);
        }
    }
```
4) Update your app.yaml with:
```
env_variables:
  LOG_CHANNEL: stackdriver
```
