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
            'methods'       => ['GET'],
            'auth'          => false
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
