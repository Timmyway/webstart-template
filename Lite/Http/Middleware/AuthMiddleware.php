<?php
namespace Lite\Http\Middleware;

use App\Controllers\AuthController;
use Lite\Http\Request;
use Lite\Http\Security\Auth;

class AuthMiddleware implements MiddlewareInterface
{    
    public function __invoke(Request $request, callable $controller)
    {               
        if (!Auth::user()->auth) {                        
            // dd($controller);
            
        }
        echo '===> Auth middleware...';
        return $controller;
    }
}
