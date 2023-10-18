<?php
namespace Lite\Http\Middleware;

use App\Controllers\AuthController;
use Lite\Http\Request;
use Lite\Http\Security\Auth;

class AuthMiddleware extends Middleware
{    
    public function handle()
    {        
        if (!Auth::user($this->request) && !isActiveRoute('login')) {
            return redirect('login');
        }
        if (Auth::user($this->request) && isActiveRoute('login')) {
            return redirect('home');
        }       
    }
}
