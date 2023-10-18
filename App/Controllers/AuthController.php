<?php
namespace App\Controllers;

use Lite\Http\Request;
use Lite\Routing\BaseController;

class AuthController extends BaseController
{
    public function loginPage(Request $request)
    {
        $users = $this->db()->table('users')->get();
        $route = route('login');
        dd($route);
        return $this->render('pages.login');
    }

    public function signIn(Request $request)
    {        
        return response()->json(['name' => 'Tim'])->send();
    }
}