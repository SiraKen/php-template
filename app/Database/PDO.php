<?php

namespace App\Database;

use App\Console\Message;
use PDO as DBObject;
use PDOException;

class PDO
{
    public function get_pdo($dsn, $username, $password, $driver_options)
    {
        try {
            $pdo_object = new DBObject($dsn, $username, $password, $driver_options);
            echo Message::success("Database connection success.") . "\n\n";
            return $pdo_object;
        } catch (PDOException $e) {
            exit(Message::error("Database connection error: ") . $e->getMessage() . "\n");
        }
    }
}
