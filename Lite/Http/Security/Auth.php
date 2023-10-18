<?php
namespace Lite\Http\Security;

use stdClass;

class Auth
{
    public static function user()
    {
        $user = new stdClass();
        $user->user = 'Tim';
        $user->auth = true;
        return $user;
    }
}