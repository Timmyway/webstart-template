<?php
namespace App\Controllers;

use Lite\Http\Request;
use Lite\Http\Response;

class SiteController extends Controller
{
    public function home(Request $request)
    {
        $user = $request->getSession()->get('user');        
        return $this->render('pages.home', ['user' => $user]);
    }

    public function about()
    {        
        // dd($users);
        return $this->render('pages.about');
    }

    public function users()
    {
        $db = $this->container->get('database')->capsule();
        $users = $db->table('users')->select('id', 'name', 'email')->get();
        // dd($users);
        return $this->render('pages.users', ['users' => $users]);
    }

    public function lost()
    {        
        return $this->render('pages.404');
    }
}