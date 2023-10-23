<?php
namespace Lite\Http\Security;

use Lite\Http\Session;

class Csrf
{
    // Generate CSRF token
    static function generate(Session $session, string $name = 'csrf_token', bool $asTag = true): string
    {
        $token = bin2hex(random_bytes(32));
        $session->set($name, $token);        
        return $asTag ? 
            '<input type="hidden" name="'.$name.'" value="' . $token . '">' 
            : $token;
    }

    // Verify CSRF token
    static function verify(Session $session, ?string $token, string $name = 'csrf_token'): bool
    {        
        if (!$session->has($name) || !$token) {
            return false;
        }

        $storedToken = $session->get($name);
        $session->remove($name);

        return hash_equals($storedToken, $token);
    }
}