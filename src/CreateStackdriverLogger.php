<?php

namespace Firevel\Stackdriver;

use Google\Cloud\Logging\LoggingClient;
use Monolog\Handler\PsrHandler;
use Monolog\Logger;

class CreateStackdriverLogger
{
    /**
     * Create a custom Monolog instance.
     *
     * @param array $config
     *
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $logName = isset($config['logName']) ? $config['logName'] : 'app';
        $logging = new LoggingClient();
        $logger = $logging->psrLogger($logName, ['batchEnabled' => true]);

        return new Logger('stackdriver', [new PsrHandler($logger)]);
    }
}
