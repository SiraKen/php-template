<?php

namespace App\Console;

class Message
{
    /**
     * Returns a success message
     * 
     * @param string $message
     * @return string
     */
    public static function success($string)
    {
        return "\033[0;32m$string\033[0m";
    }

    /**
     * Returns an error message
     * 
     * @param string $message
     * @return string
     */
    public static function error($string)
    {
        return "\033[0;31m$string\033[0m";
    }

    /**
     * Returns a warning message
     * 
     * @param string $message
     * @return string
     */
    public static function warning($string)
    {
        return "\033[0;33m$string\033[0m";
    }

    /**
     * Returns an info message
     * 
     * @param string $message
     * @return string
     */
    public static function info($string)
    {
        return "\033[0;34m$string\033[0m";
    }
}
