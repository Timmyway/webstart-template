<?php

use App\Controllers\SiteController;
use Lite\Routing\Routes;

$routes = new Routes;

$routes->add('name', '/', ['_controller' => [new SiteController, 'home']]);
$routes->add('about', '/about', ['_controller' => [new SiteController, 'about']]);