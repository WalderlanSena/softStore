<?php

namespace App\SoftStore\Config\Routes;

use App\SoftStore\Infrastructure\Controller\Administration\AdministrationController;
use App\SoftStore\Infrastructure\Controller\Home\HomeController;
use App\SoftStore\Infrastructure\Controller\Order\OrderController;

return [
    'routes' => [

        'home' => [
            'route'         => '/',
            'controller'    => HomeController::class,
            'action'        => 'index',
            'method'        => ['GET'],
            'auth'          => false
        ],

        'admin' => [
            'route'         => '/administracao',
            'controller'    => AdministrationController::class,
            'action'        => 'home',
            'method'        => ['GET'],
            'auth'          => true
        ],
        'order' => [
            'route'         => '/administracao/cadastrar-novo-pedido',
            'controller'    => OrderController::class,
            'action'        => 'registerNewOrder',
            'method'        => ['GET'],
            'auth'          => true
        ],
    ],
];
