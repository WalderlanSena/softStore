<?php

namespace App\SoftStore\System;

use App\SoftStore\System\DI\DependencyInjection;
use App\SoftStore\System\Http\Request;
use App\SoftStore\System\Redirect\Redirect;
use App\SoftStore\System\Session\SessionHandler;

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
        $this->params = [];
        $routeFound   = false;
        $action = '';

        foreach ($this->routes as $route) {
            if ($route['route'] == $url) {
                $routeFound       = true;
                $this->controller = $route['controller'];
                $action           = $route['action'];
            }

            if ($routeFound && $route['auth'] && !SessionHandler::getSession('user')) {
                return Redirect::redirectToRoute('/');
            }

            if ($routeFound) {
                try {
                    $reflection = new \ReflectionClass($this->controller);
                    $reflection->newInstance();
                    $controller = $reflection->newInstance();
                    return $controller->$action(new Request());
                } catch (\Exception $exception) {

                }
            }
        }

       return DependencyInjection::pageNotFound();
    }

    protected function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}