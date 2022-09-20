<?php

namespace App\Lib;

use App\Console\Message;
use PDO as DBObject;
use PDOException;

class PDO
{
    /**
     * Get PDO object
     * 
     * @param string $dsn
     * @param string $username
     * @param string $password
     * @param array $options
     * @return DBObject
     */
    public function get_pdo($dsn, $username, $password, $options)
    {
        try {
            $pdo_object = new DBObject($dsn, $username, $password, $options);
            echo Message::success("Database connection success.") . "\n\n";
            return $pdo_object;
        } catch (PDOException $e) {
            exit(Message::error("Database connection error: ") . $e->getMessage() . "\n");
        }
    }
}
