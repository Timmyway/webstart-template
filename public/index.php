<?php

use App\Providers\TemplateEngineServiceProvider;
use Lite\Http\Request;
use Lite\Lite;
use Lite\Routing\Router;
use Symfony\Component\Routing\RouteCollection;

const BASEPATH = __DIR__ . '/../';
require '../App/bootstrap.php';

// Request setting
$request = Request::init();
$lite = new Lite();
$lite->run($request, $routes);

// $router = new Router();
// $routes = require basePath('routes.php');
// // Equivalent to parse_url($_SERVER['REQUEST_URI'])['path']
// $uri = $request->getPathInfo();

// // Equivalent to $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']
// $method = $request->getMethod();

// $router->route($uri, $method);
// // require view('pages/home.php', ['name' => 'Timmy Way 2024']);