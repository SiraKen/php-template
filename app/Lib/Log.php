<?php

namespace App\Lib;

use \Monolog\Logger as Monolog;
use \Monolog\Handler\StreamHandler;
use \Monolog\Level as MonologLevel;

class Log
{
    public $logger;

    public function __construct()
    {
        $log_file = __DIR__ . '/../../logs/app.log';

        $this->logger = new Monolog('app');
        $this->logger->pushHandler(new StreamHandler($log_file, MonologLevel::Warning));
    }
}
