<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Model\User;
use Illuminate\Database\Capsule\Manager as DB;

// 
// These are examples. You can delete them.
// 

$dangerous_html = '<script>alert("Hello, World!");</script>';
echo h($dangerous_html);

$tables = DB::select('SHOW TABLES');
foreach ($tables as $table) {
    $table_name = array_values((array)$table)[0];
    echo $table_name . '<br>';
}
