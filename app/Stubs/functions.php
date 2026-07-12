<?php

// Global helper functions stubs
if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed {
        return $_ENV[$key] ?? $_SERVER[$key] ?? $default;
    }
}

if (!function_exists('view')) {
    function view(string $view, array $data = []): string {
        return '';
    }
}

if (!function_exists('database_path')) {
    function database_path(string $path = ''): string {
        return '';
    }
}

if (!function_exists('storage_path')) {
    function storage_path(string $path = ''): string {
        return '';
    }
}

if (!function_exists('config_path')) {
    function config_path(string $path = ''): string {
        return '';
    }
}

if (!function_exists('config')) {
    function config(string $key, mixed $default = null): mixed {
        return $default;
    }
}
