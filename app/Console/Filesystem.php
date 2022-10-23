<?php

namespace App\Console;

class Filesystem
{
    /**
     * Write a file
     * 
     * @param string $path
     * @param string $content
     * @return void
     */
    public static function write_file($path, $content)
    {
        $file = fopen($path, "w") or die(Message::error("Unable to create file!"));
        fwrite($file, $content);
        fclose($file);
        echo Message::success("File created successfully!");
    }
}
