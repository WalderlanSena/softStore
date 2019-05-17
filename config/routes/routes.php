<?php

namespace App\SoftStore\Config\Routes;

use App\SoftStore\Infrastructure\Controller\Administration\AdministrationController;
use App\SoftStore\Infrastructure\Controller\Authentication\AuthenticationController;
use App\SoftStore\Infrastructure\Controller\Home\HomeController;
use App\SoftStore\Infrastructure\Controller\Order\OrderController;

return [
    'routes' => [

        'home' => [
            'route'         => '/',
            'controller'    => HomeController::class,
            'action'        => 'index',
            'methods'       => ['GET'],
            'auth'          => false
        ],

        'auth' => [
            'route'         => '/authentication',
            'controller'    => AuthenticationController::class,
            'action'        => 'auth',
            'methods'       => ['POST'],
            'auth'          => false
        ],

        'logout' => [
            'route'         => '/logout',
            'controller'    => AuthenticationController::class,
            'action'        => 'logout',
            'methods'       => ['GET'],
            'auth'          => true
        ],

        'order' => [
            'route'         => '/administracao',
            'controller'    => AdministrationController::class,
            'action'        => 'home',
            'methods'       => ['GET'],
            'auth'          => true
        ],

        'order-new-order' => [
            'route'         => '/administracao/cadastrar-novo-pedido',
            'controller'    => OrderController::class,
            'action'        => 'registerNewOrder',
            'methods'       => ['GET'],
            'auth'          => true
        ],
    ],
];
