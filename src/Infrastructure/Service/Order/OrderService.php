<?php

namespace App\SoftStore\Infrastructure\Service\Order;

use App\SoftStore\Infrastructure\Repository\Order\OrderRepository;
use App\SoftStore\System\DI\DependencyInjection;

class OrderService
{
    /**
     * @var OrderRepository $orderRepository
     */
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = DependencyInjection::getRepository(OrderRepository::class);
    }

    public function saveNewOrder(array $request)
    {
        try {
            $this->orderRepository->save($this->mountOrderForSave($request));
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    private function mountOrderForSave(array $request)
    {
        return [
            'pedido'        => filter_var($request['pedido'], FILTER_SANITIZE_STRING),
            'codigo'        => filter_var($request['codigo'], FILTER_SANITIZE_STRING),
            'tipo'          => filter_var($request['tipo'], FILTER_SANITIZE_STRING),
            'descricao'     => filter_var($request['descricao'], FILTER_SANITIZE_STRING),
            'valor'         => filter_var((float)$request['valor'], FILTER_SANITIZE_NUMBER_FLOAT),
            'quantidade'    => filter_var((int)$request['valor'], FILTER_SANITIZE_NUMBER_INT),
            'imposto'       => filter_var((int)$request['imposto'], FILTER_SANITIZE_NUMBER_INT),
        ];
    }
}