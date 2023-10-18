<?php
namespace Lite\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MiddlewareListener implements EventSubscriberInterface
{
    public function __construct()
    {
        
    }

    public function onAppMiddleware(MiddlewareEvent $event)
    {
        $event->getMiddlewareStack()->execute(
            $event->getRequest(),
            $event->getRouteDetails(),
            $event->getRouteDetails()
        );
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.controller' => 'onKernelController',
        ];
    }
}
