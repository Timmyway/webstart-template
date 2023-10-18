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

    public function __construct(RouteCollection $routeCollection, RequestContext $context)
    {
        $this->routeCollection = $routeCollection;
        $this->urlGenerator = new UrlGenerator($routeCollection, $context);
        $this->urlMatcher = new UrlMatcher($routeCollection, $context);
    }

    public function generateUrl($routeName, $parameters = [])
    {
        return $this->urlGenerator->generate($routeName, $parameters, UrlGeneratorInterface::ABSOLUTE_URL);
    }

    public function matchRoute($pathInfo)
    {
        return $this->urlMatcher->match($pathInfo);
    }
}