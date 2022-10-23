<?php

namespace App\Core;

class Middleware
{
    public static function handle($request, $response, $next)
    {
        $response = $next($request, $response);

        return $response;
    }
}
