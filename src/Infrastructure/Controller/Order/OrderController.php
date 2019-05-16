<?php

namespace App\SoftStore\Infrastructure\Controller\Order;

use App\SoftStore\System\Controller\AbstractController;

class OrderController extends AbstractController
{
    public function __construct()
    {
    }

    public function registerNewOrder()
    {
        return $this->render('order/order-register',[]);
    }
}