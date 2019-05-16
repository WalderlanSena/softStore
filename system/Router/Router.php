<?php

namespace App\SoftStore\System\Router;

use App\SoftStore\System\Kernel;

class Router extends Kernel
{
    public function addRoutes()
    {
        $routes = include __DIR__ .'/../../config/routes/routes.php';
        $this->routes = $routes['routes'];
    }
}