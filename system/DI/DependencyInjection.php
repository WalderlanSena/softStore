<?php

namespace App\SoftStore\System\DI;

abstract class DependencyInjection
{
    /**
     * @param string $controller
     * @return mixed
     */
    public static function getController(string $controller)
    {
        return new $controller();
    }

    /**
     * @param string $service
     * @return mixed
     */
    public static function getService(string $service)
    {
        return new $service();
    }

    /**
     * @param string $repository
     * @return mixed
     */
    public static function getRepository(string $repository)
    {
        return new $repository();
    }

    public static function pageNotFound()
    {
        return include __DIR__ . '/../../templates/errors/404/pageNotFound.phtml.php';
    }

    public static function accessDenied()
    {
        return include __DIR__ . '/../../templates/errors/403/accessDenied.phtml';
    }
}