<?php
namespace Lite\Auth;

use Lite\Http\Request;

class SessionManager
{
    public static function storeAll(Request $request, array $sessionData)
    {
        $session = $request->getSession();

        foreach ($sessionData as $key => $value) {
            $session->set($key, $value);
        }
    }

    public static function addItemsToFlashBag(Request $request, array $items)
    {
        $flashes = $request->getSession()->getFlashBag();
        foreach ($items as $key => $value) {
            $flashes->add($key, $value);
        }
    }
}