<?php
namespace App\Controllers;

use Lite\Http\Request;
use Lite\Http\Response;
use Illuminate\Database\Capsule\Manager as Capsule;

class SiteController extends BaseController
{
    public function home()
    {        
        return $this->render('pages.home');
    }

    public function about()
    {
        $db = $this->container->get('database')->capsule();
        $users = $db->table('users')->select('id', 'name', 'email')->get();
        // dd($users);
        return $this->render('pages.about', ['users' => $users]);
    }

    public function users()
    {
        $db = $this->container->get('database')->capsule();
        $users = $db->table('users')->select('id', 'name', 'email')->get();
        // dd($users);
        return $this->render('pages.about', ['users' => $users]);
    }

    public function lost()
    {        
        return $this->render('pages.404');
    }
}