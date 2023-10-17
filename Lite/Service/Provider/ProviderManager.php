<?php
namespace Lite\Service\Provider;

use Lite\Service\Container;

class ProviderManager
{
    protected array $providers = [];
    private $container;
    
    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function register(ProviderInterface $provider): void
    {
        $this->providers[] = $provider;
    }    

    public function boot(): void
    {
        foreach ($this->providers as $provider) {
            $this->container = $provider->register($this->container);
        }
    }
}
