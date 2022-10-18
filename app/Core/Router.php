<?php

namespace App\Core;

use AltoRouter;

class Router
{
    public static $router;

    public function __construct()
    {
        self::$router = new AltoRouter();
    }

    public static function get($path, $target, $name = null)
    {
        self::$router->map("GET", $path, $target, $name);
    }

    public static function post($path, $target, $name = null)
    {
        self::$router->map("POST", $path, $target, $name);
    }

    public static function put($path, $target, $name = null)
    {
        self::$router->map("PUT", $path, $target, $name);
    }

    public static function patch($path, $target, $name = null)
    {
        self::$router->map("PATCH", $path, $target, $name);
    }

    public static function delete($path, $target, $name = null)
    {
        self::$router->map("DELETE", $path, $target, $name);
    }

    public static function dispatch()
    {
        $match = self::$router->match();
        // var_dump($match);

        if ($match) {
            $target = $match["target"];

            if (is_callable($target)) {
                call_user_func_array($target, $match["params"]);
            } else if (is_string($target) && strpos($target, "@") !== false) {
                $target = explode("@", $target);
                $controller = $target[0];
                $controller = new $controller();
                call_user_func_array([$controller, $target[1]], $match["params"]);
            } else if (is_array($target)) {
                $controller = new $target[0]();
                $action = $target[1];
                $func = [$controller, $action];

                if (is_callable($func)) {
                    call_user_func_array($func, $match["params"]);
                } else {
                    throw new \Exception("Controller action not found: {$target[0]}@{$target[1]}");
                }
            } else {
                throw new \Exception("Route target not found: {$target}");
            }
        } else {
            throw new \Exception("No route matched.");
        }
    }
}
