<?php

use Lite\Routing\Routes;

$routes = new Routes;

$routes->add('name', '/', ['_controller' => 'App\Controllers\SiteController::home']);
$routes->add('about', '/about', ['_controller' => 'App\Controllers\SiteController::about']);
$routes->add('hello', '/hello/{name}', ['_controller' => 'App\Controllers\SiteController::hello']);