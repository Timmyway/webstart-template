<?php

use Lite\Routing\Routes;

$routes = new Routes;

$routes->get('home', '/', ['_controller' => 'App\Controllers\SiteController::home', 'middleware' => 'auth|clean']);
$routes->get('profile', '/profile', ['_controller' => 'App\Controllers\SiteController::profile', 'middleware' => 'auth|csrf']);
$routes->get('landing.demo', '/landing/demo', ['_controller' => 'App\Controllers\LandingpageController::demo']);

// Auth routes
$routes->get('login', '/login', ['_controller' => 'App\Controllers\AuthController::loginPage', 'middleware' => 'auth']);
$routes->post('logout', '/logout', ['_controller' => 'App\Controllers\AuthController::signOut']);
$routes->post('login.signin', '/login', ['_controller' => 'App\Controllers\AuthController::signIn']);
$routes->get('lost', '/lost', ['_controller' => 'App\Controllers\SiteController::lost']);