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

    public function register(array $providerData): void
    {
        $this->providers[] = $providerData;
        // dd($this->providers);
    }    

    public function boot(): void
    {
        foreach ($this->providers as $providerData) {
            $providerClass = $providerData[0];
            $params = $providerData[1] ?? [];            
            $provider = new $providerClass();
            $this->container = $provider->register($this->container, $params);
        }
    }
}
