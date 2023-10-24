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
                $message = 'You are being redirected to the login page momentarily for security purposes. Please try logging in again.';
                echo '<h1 style="font-size: 18px; color: red;">'.$message.'</h1>';
                echo '<meta http-equiv="refresh" content="5;url='.route('login').'" />';
                die();
            }            
            echo 'Token matched successfully !!!';
            // we can safely remove token because it will be regenerated            
            $this->request->getSession()->remove('csrf_token');
        }        
    }
}