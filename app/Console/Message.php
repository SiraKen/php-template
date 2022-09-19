<?php

namespace App\Console;

class Message
{
    public static function success($string)
    {
        return "\033[0;32m$string\033[0m";
    }

    public static function error($string)
    {
        return "\033[0;31m$string\033[0m";
    }
}
