<?php
namespace App\Controllers;

use Lite\Http\Request;
use Lite\Http\Response;
use Illuminate\Database\Capsule\Manager as Capsule;

class SiteController extends BaseController
{
    public function home(Request $request)
    {        
        return $this->render('pages.home');
    }

    public function about(Request $request)
    {
        $db = $this->container->get('database')->capsule();                
        return $this->render('pages.about');
    }

    public function hello($name, Request $request)
    {
        $response = new Response();
        $response->setContent('Hi my friend...'.$request->get('name'));
        $response->headers->set('Content-Type', 'text/html');
        $response->send();
    }
}