<?php
namespace Lite\Http\Middleware;

use App\Controllers\AuthController;
use Lite\Http\Request;
use Lite\Http\Security\Auth;

class AuthMiddleware extends Middleware
{    
    public function handle()
    {        
        // dd('before');
        $isLoggedIn = $this->request->getSession()->has('loggedIn');        
        if (!$isLoggedIn && !isActiveRoute('login')) {
            return redirect('login');
        } else if ($isLoggedIn && isActiveRoute('login')) {
            // Logged in and visit login page
            return redirect('nowhere');
        }        
    }
}