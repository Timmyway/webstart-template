<?php
namespace Lite\Event;

use Symfony\Contracts\EventDispatcher\Event;

class ControllerEvent extends Event
{
    protected $controller;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController($controller)
    {
        $this->controller = $controller;
    }
}