<?php
namespace Lite\Http\Middleware;

use Lite\Http\Security\Csrf;
use Lite\Service\ContainerHolder;

class CsrfMiddleware extends Middleware
{    
    public function handle()
    {
        if ($this->request->isMethod('POST')) {            
            // dd('Checking csrf token...', $this->request->getSession()->get('csrf_token'));
            $token = $this->request->request->get('csrf_token');            
            if (!Csrf::verify($this->request->getSession(), $token)) {
                // Handle CSRF token mismatch here (e.g., return a response or throw an exception)
                $sessionToken = $this->request->getSession()->get('csrf_token');
                dd($sessionToken, ' <--- token mismatch --->', $token);
                die();
            }            
            echo 'Token matched successfully !!!';
            // we can safely remove token because it will be regenerated            
            $this->request->getSession()->remove('csrf_token');
        }        
    }
}