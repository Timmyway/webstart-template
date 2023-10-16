<?php
namespace App\Controllers;

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
}