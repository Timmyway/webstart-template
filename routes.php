<?php

use Lite\Routing\Routes;

$routes = new Routes;

$routes->get('home', '/', ['_controller' => 'App\Controllers\SiteController::home', 'middleware' => 'auth|clean']);
$routes->get('about', '/about', ['_controller' => 'App\Controllers\SiteController::about']);
$routes->get('users', '/users', ['_controller' => 'App\Controllers\SiteController::users', 'middleware' => 'auth']);
$routes->get('login', '/login', ['_controller' => 'App\Controllers\AuthController::loginPage', 'middleware' => 'auth']);
$routes->post('logout', '/logout', ['_controller' => 'App\Controllers\AuthController::signOut']);
$routes->post('login.signin', '/login', ['_controller' => 'App\Controllers\AuthController::signIn']);
$routes->get('lost', '/lost', ['_controller' => 'App\Controllers\SiteController::lost']);