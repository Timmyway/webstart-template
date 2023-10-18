<?php
namespace App\Controllers;

use Lite\Http\Request;
use Lite\Routing\BaseController;

class AuthController extends BaseController
{
    public function loginPage(Request $request)
    {        
        $route = route('login');        
        return $this->render('pages.login');
    }

    public function signIn(Request $request)
    {        
        return response()->json(['name' => 'Tim'])->send();
    }
}