<?php
namespace Lite\Service;

use Lite\Service\Container;

/**
 * AbstractServiceManager is a base class for managing service providers.
 *
 * This abstract class provides a common structure for managing service providers and booting them.
 * Its job is to inject the services (template engine, database, route helper...) to the container.
 * So they can be accessible through Controller.
 * 
 * @package Lite\Service\Manager
 */
abstract class AbstractServiceManager
{
    protected array $providers = [];
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register(array $providerData): void
    {
        $this->providers[] = $providerData;
    }

    public function setProviders(array $providers): AbstractServiceManager
    {
        $this->providers = $providers;
        return $this;
    }

    public function registerAll(): AbstractServiceManager
    {
        foreach ($this->providers as $provider) {
            $this->register($provider);
        }
        return $this;
    }

    public function boot(): void
    {
        foreach ($this->providers as $providerData) {
            [$providerClass, $params] = $providerData + [null, []]; // Ensure $params is an array

            // Check if $providerClass is a valid class
            if (class_exists($providerClass)) {
                $provider = new $providerClass();
                $this->container = $provider->register($this->container, $params);
            }
        }
    }

    // You can add more methods or abstract methods here for specific manager implementations.
}