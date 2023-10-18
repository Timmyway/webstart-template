<?php

use Lite\Event\EventDispatcher;
use Lite\Http\Request;
use Lite\Http\Session;
use Lite\Lite;

const BASEPATH = __DIR__ . '/../';
require '../App/bootstrap.php';

// Dispatcher
$dispatcher = new EventDispatcher();
// $dispatcher->addListener('auth', function() {
//     if (!Auth::user()->auth && !isActiveRoute('login')) {
//         // dd('Authorization is required !!!');
//         return redirect('login');
//     }
//     if (isActiveRoute('login')) {
//         return redirect('lost');
//     }
// });

// Request setting
$request = Request::init();
$session = new Session();
$session->start();
$request->setSession($session);

$lite = new Lite($dispatcher);
$lite->run($request, $routes);

// $router = new Router();
// $routes = require basePath('routes.php');
// // Equivalent to parse_url($_SERVER['REQUEST_URI'])['path']
// $uri = $request->getPathInfo();

// // Equivalent to $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']
// $method = $request->getMethod();

// $router->route($uri, $method);
// // require view('pages/home.php', ['name' => 'Timmy Way 2024']);