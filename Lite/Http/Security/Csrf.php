<?php
namespace Lite\Http\Security;

use Lite\Http\Session;

class Csrf
{
    // Generate CSRF token
    function generateCsrfToken(Session $session): string
    {
        $token = bin2hex(random_bytes(32));
        $session->set('csrf_token', $token);
        return $token;
    }

    // Verify CSRF token
    function verifyCsrfToken(Session $session, string $token): bool
    {
        if (!$session->has('csrf_token') || !$token) {
            return false;
        }

        $storedToken = $session->get('csrf_token');
        $session->remove('csrf_token');

        return hash_equals($storedToken, $token);
    }
}