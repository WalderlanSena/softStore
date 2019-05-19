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
            $sql = "INSERT INTO orders (nome, codigo, tipo, descricao, imposto, valor, quantidade, id_customers)  
                    VALUES (:nome, :codigo, :tipo, :descricao, :imposto, :valor,:quantidade, :id_customers)";
            $stmt = $this->getConnectionManager()->prepare($sql);
            $stmt->bindValue(":nome",$data['pedido']);
            $stmt->bindValue(":codigo",$data['codigo']);
            $stmt->bindValue(":tipo",$data['tipo']);
            $stmt->bindValue(":descricao",$data['descricao']);
            $stmt->bindValue(":imposto",$data['imposto']);
            $stmt->bindValue(":valor",$data['valor']);
            $stmt->bindValue(":quantidade",$data['quantidade']);
            $stmt->bindValue(":id_customers",$data['id_customer']);
            return $stmt->execute();
        } catch (\PDOException $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}