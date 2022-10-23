<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();

/*
|-------------------------------------------------------------------
| Routes
|-------------------------------------------------------------------
| 
| Here you can register all of the routes for an application.
|
*/
$router::get("/", function () {
    echo "Hello World!";
});

// Dispatch the router
$router::dispatch();
