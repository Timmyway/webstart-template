<?php
use Core\Router;
use Lite\Http\Request;

require "../vendor/autoload.php";
const BASEPATH = __DIR__ . '/../';
require "../function.php";

// Request setting
$request = Request::init();

$router = new Router();
$routes = require base_path('routes.php');
// Equivalent to parse_url($_SERVER['REQUEST_URI'])['path']
$uri = $request->getPathInfo();

// Equivalent to $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']
$method = $request->getMethod();

$router->route($uri, $method);
// require view('pages/home.php', ['name' => 'Timmy Way 2024']);