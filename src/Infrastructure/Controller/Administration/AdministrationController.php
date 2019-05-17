<?php

namespace App\SoftStore\Infrastructure\Controller\Administration;

use App\SoftStore\Infrastructure\Service\Authentication\AuthenticationService;
use App\SoftStore\System\Controller\AbstractController;
use App\SoftStore\System\DI\DependencyInjection;

class AdministrationController extends AbstractController
{
    private $authenticationService;

    public function __construct()
    {
        $this->authenticationService = DependencyInjection::getService(AuthenticationService::class);
    }

    public function home()
    {
        return $this->render('admin/administration');
    }

    public function registerNewOrder()
    {
        return $this->render('order/order-register',[]);
    }
}