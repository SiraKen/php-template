<?php

// Load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->safeLoad();

// Initialize Whoops
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Set timezone
date_default_timezone_set($_ENV['DEFAULT_TIMEZONE']);

// Start session
session_start();

/**
 * h - shorthand for htmlspecialchars
 * 
 * @param  string $string
 * @return string
 */
function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * hbr - shorthand for htmlspecialchars and nl2br
 * 
 * @param  string $string
 * @return string
 */
function hbr($string)
{
    return nl2br(h($string));
}

/**
 * Redirect to another page
 * 
 * @param  string $url
 * @return void
 */
function redirect($url)
{
    header("Location: $url");
    exit;
}

/**
 * Component
 * 
 * @deprecated Currently not working
 */
function component($component_name, $data = [])
{
    $component_path = __DIR__ . "/../Components/$component_name.php";
    if (file_exists($component_path)) {
        extract($data);
        require $component_path;
    } else {
        exit("Component not found: $component_name");
    }
}

/**
 * Session
 * 
 * @param  string $key
 * @param  mixed $value
 * @return mixed
 */
function session($key, $value = null)
{
    if (is_null($value)) {
        return $_SESSION[$key] ?? null;
    } else {
        $_SESSION[$key] = $value;
    }
}

/**
 * Config
 * 
 * @param  string $key
 * @param  mixed $value
 * @return mixed
 */
function config($key, $value = null)
{
    if (is_null($value)) {
        return $_ENV[$key] ?? null;
    } else {
        $_ENV[$key] = $value;
    }
}

/**
 * JSON
 * 
 * @param  mixed $data
 * @return void
 */
function json($data)
{
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

/**
 * d - shorthand for var_dump
 * 
 * @param  mixed $data
 * @return void
 */
function d()
{
    array_map(function ($x) {
        var_dump($x);
    }, func_get_args());
}

/**
 * dd - shorthand for var_dump and die
 * 
 * @param  mixed $data
 * @return void
 */
function dd()
{
    array_map(function ($x) {
        var_dump($x);
    }, func_get_args());
    die;
}
