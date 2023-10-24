<?php
namespace Lite\Http\Security;

use Lite\Http\Session;

class Csrf
{
    // Generate CSRF token
    static function generate(Session $session, string $name = 'csrf_token', bool $asTag = true): string
    {        
        // Generate new token when session does not already have one
        // On login page, we must generate new token for better security              
        // if (!$session->has('csrf_token') || $routeName === 'login') {            
        //     $token = bin2hex(random_bytes(32));    
        // } else {
        //     $token = $session->get('csrf_token');
        // }                
        $token = bin2hex(random_bytes(32));
        // dd('Generate csrf token: ', $token);
        $session->set($name, $token);        
        return $asTag ? 
            '<input type="hidden" name="'.$name.'" value="' . $token . '">' 
            : $token;
    }

    // Verify CSRF token
    static function verify(Session $session, ?string $token, string $name = 'csrf_token'): bool
    {
        // Check token presence
        if (!$session->has($name) || !$token) {
            return false;
        }
        
        $storedToken = $session->get($name);                

        return hash_equals($storedToken, $token);
    }
}