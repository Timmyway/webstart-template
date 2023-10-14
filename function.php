<?php

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "<pre>";

    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function base_path($path) {
    return BASEPATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);    

    return base_path('views/' . $path);
}