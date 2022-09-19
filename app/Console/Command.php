<?php

namespace App\Console;

use App\Console\Message;

class Command
{
    public function run()
    {
        $message = new Message();
        echo $message->success('Hello, World!');
    }
}
