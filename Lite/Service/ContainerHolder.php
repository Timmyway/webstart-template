<?php
namespace Lite\Service;

// ContainerHolder.php
class ContainerHolder
{
    private static $container;

    public static function setContainer(Container $container)
    {
        self::$container = $container;
    }

    public static function getContainer(): Container
    {
        return self::$container;
    }
}

