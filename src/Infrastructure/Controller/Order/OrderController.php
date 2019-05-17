<?php

namespace App\SoftStore\Infrastructure\Controller\Order;

use App\SoftStore\Infrastructure\Service\Order\OrderService;
use App\SoftStore\System\Controller\AbstractController;
use App\SoftStore\System\DI\DependencyInjection;
use App\SoftStore\System\Http\Interfaces\ServerRequestInterface;

class OrderController extends AbstractController
{
    /**
     * @var OrderService $orderService
     */
    private $orderService;

    public function __construct()
    {
        $this->orderService = DependencyInjection::getService(OrderService::class);
    }

    public function registerNewOrder()
    {
        return $this->render('order/order-register',[]);
    }

    public function saveOrder(ServerRequestInterface $serverRequest)
    {
        try {
            $this->orderService->saveNewOrder($serverRequest::formatRequest());
        } catch (\Exception $exception) {
        }
    }
}