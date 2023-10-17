<?php

// CustomRequest.php
namespace Lite\Http;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request extends SymfonyRequest
{   
    private $services;

    public static function init()
    {
        return self::createFromGlobals();
    }

    public function addService($name, $value)
    {
        $this->services[$name] = $value;
    }

    public function getService($name)
    {
        return $this->services[$name];
    }
}