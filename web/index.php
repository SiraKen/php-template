<?php
require_once __DIR__ . '/../vendor/autoload.php';

// 
// These are examples. You can delete them.
// 

$dangerous_html = '<script>alert("Hello, World!");</script>';
echo h($dangerous_html);
