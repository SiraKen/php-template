<?php

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
 * 
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
