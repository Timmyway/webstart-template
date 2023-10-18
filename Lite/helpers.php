<?php

use Lite\Http\RedirectResponse;
use Lite\Http\Response;

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function basePath(string $path = ''): string {
    return BASEPATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);    

    return basePath('views' . DIRECTORY_SEPARATOR . $path);
}

function getBaseUrl() {
    // Determine the current protocol (HTTP or HTTPS)
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

    // Get the current domain and port
    $host = $_SERVER['HTTP_HOST'];

    // Construct and return the base URL
    $baseUrl = $protocol . '://' . $host;
    return $baseUrl;
}

function asset($path, $publicFolder = '') {
    // Get the base URL using the getBaseUrl function
    $baseUrl = getBaseUrl();    

    // Combine the base URL and asset path to create the asset URL
    $assetUrl = $baseUrl . '/' . $publicFolder . $path;

    return $assetUrl;
}

if (!function_exists('env')) {
    function env(string $key, $default = ''): string|null {
        try {
            return $_ENV[$key];
        } catch(Throwable $e) {            
            return $default;
        }
    }
}

if (!function_exists('config')) {
    function config(string $key, $default = ''): string|null {
        try {
            return $_ENV[$key];
        } catch(Throwable $e) {            
            return $default;
        }
    }
}

if (!function_exists('liteHash')) {
    function liteHash(string $passwordString): string {
        return password_hash($passwordString, PASSWORD_DEFAULT);
    }
}

if (!function_exists('now')) {
    function now(): \DateTimeImmutable
    {
        return new \DateTimeImmutable();
    }
}

if (!function_exists('redirect')) {
    function redirect(string $url, int $status = 302, array $headers = [])
    {
        $resp = new RedirectResponse($url, $status, $headers);
        $resp->send();
    }
}

if (!function_exists('response')) {
    function response(string $content = '', int $status = 200, array $headers = [])
    {
        return new Response($content, $status, $headers);
    }
}
