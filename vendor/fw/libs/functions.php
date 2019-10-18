<?php

function debug($arr)
{
    echo '<pre>'.print_r($arr, true).'</pre>';
}

function redirect ($http = false)
{
    if ($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    }
    header("location: $redirect");
    exit;
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function __($key)
{
    return \fw\core\base\Lang::get($key);
}