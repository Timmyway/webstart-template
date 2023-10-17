<?php
namespace App\Controllers;

use Lite\Http\Request;

class AuthController extends BaseController
{
    public function login(Request $request)
    {        
        return $this->render('pages.login');
    }    
}