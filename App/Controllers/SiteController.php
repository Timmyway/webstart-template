<?php
namespace App\Controllers;

use Lite\Http\Response;

class SiteController extends BaseController
{
    public function home()
    {        
        return $this->render('pages/home.php');
    }

    public function about()
    {
        require $this->render('pages/about.php');
    }

    public function hello($name)
    {
        $response = new Response();
        $response->setContent('Hi my friend...'.$name);
        $response->headers->set('Content-Type', 'text/html');
        $response->send();
    }
}