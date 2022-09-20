<?php

namespace App\Config;

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => config('DATABASE_DRIVER'),
    'host'      => config('DATABASE_HOST'),
    'port'      => config('DATABASE_PORT'),
    'database'  => config('DATABASE_NAME'),
    'username'  => config('DATABASE_USER'),
    'password'  => config('DATABASE_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
