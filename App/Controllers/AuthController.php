<?php
namespace App\Controllers;

use Lite\Http\Request;

class AuthController extends BaseController
{
    public function loginPage(Request $request)
    {
        return $this->render('pages.login');
    }

    public function signIn(Request $request)
    {        
        return response()->json(['name' => 'Tim'])->send();
    }
}