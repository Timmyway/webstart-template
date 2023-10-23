<?php
namespace Lite\Service\Provider;

use Lite\Service\Container;
use Symfony\Component\HttpFoundation\RequestStack;

class RequestServiceProvider implements ProviderInterface {

    public function register(Container $containerBuilder, $params = null) {
        $request = $params['request'];
        $containerBuilder->set('requestStack', function () use($request) {
            $requestStack = new RequestStack();
            $requestStack->push($request);
            return $requestStack;
        });        
        return $containerBuilder;
    }
}
