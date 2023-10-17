<?php
namespace Lite\Service\Provider;

use Lite\Service\Container;

interface ProviderInterface
{
    public function register(Container $containerBuilder);
}
