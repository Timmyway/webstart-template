<?php

use Lite\Routing\Routes;

$routes = new Routes;

$routes->get('home', '/', ['_controller' => 'App\Controllers\SiteController::home']);
$routes->get('about', '/about', ['_controller' => 'App\Controllers\SiteController::about']);
$routes->get('users', '/users', ['_controller' => 'App\Controllers\SiteController::users']);
$routes->get('login', '/login', ['_controller' => 'App\Controllers\AuthController::loginPage']);
$routes->post('login.signin', '/login', ['_controller' => 'App\Controllers\AuthController::signIn']);
$routes->get('lost', '/lost', ['_controller' => 'App\Controllers\SiteController::lost']);