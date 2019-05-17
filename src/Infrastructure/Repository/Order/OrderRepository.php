<?php

namespace App\SoftStore\Infrastructure\Repository\Order;

use App\SoftStore\Domain\Repository\Order\OrderRepositoryInterface;
use App\SoftStore\System\Database\EntityRepository;

class OrderRepository extends EntityRepository implements OrderRepositoryInterface
{
    public function __construct()
    {
        parent::__construct('orders');
    }

    /**
     * @param array $data
     * @return mixed|void
     * @throws \Exception
     */
    public function save(array $data)
    {
        try {
            $sql = "INSERT INTO `orders` 
                    (id, nome, codigo, tipo, descricao, imposto, valor, quantidade, id_customer) VALUES 
                    (null, :nome, :codigo, :tipo, :descricao, :imposto, :valor, :quantidade, :id_customers";
            $stmt = $this->getConnectionManager()->prepare($sql);
            $stmt->bindParam("nome",$data['pedido']);
            $stmt->bindParam("codigo",$data['codigo']);
            $stmt->bindParam("tipo",$data['tipo']);
            $stmt->bindParam("descricao",$data['descricao']);
            $stmt->bindParam("imposto",$data['imposto']);
            $stmt->bindParam("valor",$data['valor']);
            $stmt->bindParam("quantidade",$data['quantidade']);
            $stmt->bindParam("id_customers",$data['id_customer']);
            $stmt->execute();
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}