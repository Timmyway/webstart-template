<?php

// I have comment it because symfony http-kernel has already declared it
// function dd($value) {
//     echo "<pre>";
//     var_dump($value);
//     echo "<pre>";

//     die();
// }

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function base_path($path) {
    return BASEPATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);    

    return base_path('views' . DIRECTORY_SEPARATOR . $path);
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

