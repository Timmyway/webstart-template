<?php
namespace Lite\Routing;

use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class RouteHelper
{
    protected $routeCollection;
    protected $urlGenerator;
    protected $urlMatcher;
    protected $context;
    protected $env;

    public function __construct(RouteCollection $routeCollection, RequestContext $context)
    {
        $this->routeCollection = $routeCollection;
        $this->context = $context;
        $this->urlGenerator = new UrlGenerator($routeCollection, $context);
        $this->urlMatcher = new UrlMatcher($routeCollection, $context);
        $this->env = env('APP_ENV') ?? 'prod';
    }

    public function generateUrl($routeName, $parameters = [])
    {
        if ($this->env === 'local') {
            $this->context->setHost('localhost'); // Set your host here
            $this->context->setHttpPort(8500); // Set your port here
        }
        return $this->urlGenerator->generate($routeName, $parameters, UrlGeneratorInterface::ABSOLUTE_URL);
    }

    public function matchRoute($pathInfo)
    {
        return $this->urlMatcher->match($pathInfo);
    }
}