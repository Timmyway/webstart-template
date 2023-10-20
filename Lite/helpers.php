<?php

use Lite\Http\RedirectResponse;
use Lite\Http\Request;
use Lite\Http\Response;
use Lite\Service\ContainerHolder;

function urlIs($value) {
    $request = Request::createFromGlobals();
    return $request->getPathInfo() === $value;
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
        try {
            $url = route($url);
        } catch (Exception $e) {
            $url = route('lost');
        }
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

if (!function_exists('route')) {
    function route(string $routeName = ''): string
    {
        $routeHelper = ContainerHolder::getContainer()->get('routeHelper');
        return $routeHelper->generateUrl($routeName);
    }
}

if (!function_exists('isActiveRroute')) {
    function isActiveRoute(string $routeName = ''): string
    {        
        try {
            $request = Request::createFromGlobals();
            $currentRoute = $request->getRequestUri();
            $currentUrl = route($routeName)   ;     

            $parsedUrl = parse_url($currentUrl);        
            $currentPath = $parsedUrl['path'];        

            if ($currentPath === $currentRoute) {                
                return true;
            } else {
                return false;
            }                    
        } catch(Throwable $e) {            
            return false;
        }
    }

}

if (!function_exists('db')) {
    function db()
    {
        return ContainerHolder::getContainer()->get('database')->capsule();
    }
}