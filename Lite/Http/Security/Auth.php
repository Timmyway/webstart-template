<?php
namespace Lite\Http\Security;

use Lite\Http\Request;
use Lite\Service\ContainerHolder;
use stdClass;

class Auth
{
    public static function user(Request $request)
    {        
        // $request = ContainerHolder::getContainer()->get('request')->getSession();
        $authUserEmail = $request->getSession()->get('user');        
        $user = db()->table('users')
            ->where('email', $authUserEmail)
            ->select('id', 'name', 'email')
            ->first();
        if (!$user) {
            return null;
        }
        return $user;
    }
}