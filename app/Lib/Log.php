<?php

namespace App\Lib;

use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

class Log
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger('app');
        $this->logger->pushHandler(new StreamHandler(
            __DIR__ . '/../../logs/app.log',
            Logger::DEBUG
        ));

        $this->logger->info('Log initialized.');

        return $this->logger;
    }
}
