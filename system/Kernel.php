<?php

namespace App\SoftStore\System;

abstract class Kernel
{
    protected $routes;
    protected $params;
    private $controller;

    public function __construct()
    {
        $this->addRoutes();
        $this->init($this->getUrl());
    }

    abstract protected function addRoutes();


    public function init(string $url)
    {
//        $request           = explode("/", $url);
        $this->params      = [];
//        $countRouteRequest = count($request);
        $routeFound        = false;
        $action = '';

        foreach ($this->routes as $route) {
            if ($route['route'] == $url) {
                $routeFound       = true;
                $this->controller = $route['controller'];
                $action           = $route['action'];
            }

            if ($routeFound) {
                try {
                    $reflection = new \ReflectionClass($this->controller);
                    $reflection->newInstance();
                    $controller = $reflection->newInstance();
                    return $controller->$action();
                } catch (\Exception $exception) {

                }
            }
        }
        echo 'Página não encontrada...';
        return [];
    }

    protected function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}