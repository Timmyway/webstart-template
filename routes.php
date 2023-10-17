<?php

use Lite\Routing\Routes;

$routes = new Routes;

$routes->add('name', '/', ['_controller' => 'App\Controllers\SiteController::home']);
$routes->add('about', '/about', ['_controller' => 'App\Controllers\SiteController::about']);
$routes->add('users', '/users', ['_controller' => 'App\Controllers\SiteController::users']);
$routes->add('login', '/login', ['_controller' => 'App\Controllers\AuthController::login']);
$routes->add('lost', '/lost', ['_controller' => 'App\Controllers\SiteController::lost']);