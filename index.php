<?php
require_once __DIR__ . '/vendor/autoload.php';

// 
// These are examples. You can delete them.
// 
use App\Console\Command;

// Test on command line
$command = new Command();
$command->run();

// Test on web browser
$dangerous_html = '<script>alert("Hello, World!");</script>';
echo h($dangerous_html);
