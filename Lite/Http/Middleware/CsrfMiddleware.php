<?php
namespace Lite\Http\Middleware;

use Lite\Http\Security\Csrf;
use Lite\Service\ContainerHolder;

class CsrfMiddleware extends Middleware
{    
    public function handle()
    {        
        if ($this->request->isMethod('POST')) {            
            $token = $this->request->request->get('csrf_token');
            if (!Csrf::verify($this->request->getSession(), $token)) {
                // Handle CSRF token mismatch here (e.g., return a response or throw an exception)
                dd('Sorry, token mismatch', $this->request->getSession());
                die();
            }
            echo 'Token matched successfully !!!';
        }        
    }
}