<?php
namespace App\Controllers;

use Lite\Http\Request;
use Lite\Http\Response;

class SiteController extends BaseController
{
    public function home(Request $request)
    {        
        return $this->render($request, 'pages/home.php');
    }

    public function about(Request $request)
    {
        require $this->render($request, 'pages/about.php');
    }

    public function hello($name, Request $request)
    {
        $response = new Response();
        $response->setContent('Hi my friend...'.$request->get('name'));
        $response->headers->set('Content-Type', 'text/html');
        $response->send();
    }
}