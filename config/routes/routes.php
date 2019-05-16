<?php
/**
 *
 */
return [
    'routes' => [
        'home' => [
            'route'         => '/',
            'controller'    => \App\SoftStore\Infrastructure\Controller\Home\HomeController::class,
            'action'        => 'index',
            'method'        =>  'POST'
        ],
    ],
];
