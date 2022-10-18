<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Http\Controllers\ExampleController;

$router = new Router();

/*
|-------------------------------------------------------------------
| Routes
|-------------------------------------------------------------------
| 
| Here you can register all of the routes for an application.
|
*/
$router::get("/", [ExampleController::class, "index"]);

// Dispatch the router
$router::dispatch();
