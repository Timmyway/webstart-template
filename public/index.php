<?php
use Core\Router;
require "../vendor/autoload.php";
const BASEPATH = __DIR__ . '/../';
require "../function.php";

$router = new Router();
$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);
// require view('pages/home.php', ['name' => 'Timmy Way 2024']);