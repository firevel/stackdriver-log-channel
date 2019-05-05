<?php

namespace Firevel\Stackdriver;

use Google\Cloud\ErrorReporting\Bootstrap;

class StackdriverExceptionHandler
{
    /**
     * Exception handler.
     *
     * @param mixed $exception \Throwable
     */
    public static function handle($exception)
    {
        Bootstrap::init();
        Bootstrap::exceptionHandler($exception);
    }
}
