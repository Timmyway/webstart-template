<?php

// CustomRequest.php
namespace Lite\Http;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request extends SymfonyRequest
{        
    public static function init()
    {
        return self::createFromGlobals();
    }    
}