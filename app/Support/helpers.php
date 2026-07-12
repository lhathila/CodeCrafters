<?php

if (!function_exists('env')) {
    function env($key, $default = null)
    {
        $value = $_ENV[$key] ?? $_SERVER[$key] ?? null;
        if (is_null($value)) {
            return $default;
        }
        return $value;
    }
}

if (!function_exists('database_path')) {
    function database_path($path = '')
    {
        $base = __DIR__ . '/../../database';
        return $path ? $base . '/' . $path : $base;
    }
}

if (!function_exists('storage_path')) {
    function storage_path($path = '')
    {
        $base = __DIR__ . '/../../storage';
        return $path ? $base . '/' . $path : $base;
    }
}

if (!function_exists('config_path')) {
    function config_path($path = '')
    {
        $base = __DIR__ . '/../../config';
        return $path ? $base . '/' . $path : $base;
    }
}
