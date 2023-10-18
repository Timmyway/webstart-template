<?php
namespace Lite\Event;

use Lite\Http\Middleware\ContainerInjectionMiddleware;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ContainerInjectionListener implements EventSubscriberInterface
{
    private $containerInjector;

    public function __construct(ContainerInjectionMiddleware $containerInjector)
    {
        $this->containerInjector = $containerInjector;
    }

    public function onKernelController(ControllerEvent $event)
    {        
        // Inject the container into aware controllers
        $controller = $this->containerInjector->handle($event->getController());
        $event->setController($controller);
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.controller' => 'onKernelController',
        ];
    }
}
