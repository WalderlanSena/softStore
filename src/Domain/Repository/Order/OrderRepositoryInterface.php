<?php

namespace App\SoftStore\Domain\Repository\Order;

interface OrderRepositoryInterface
{
    /**
     * @param array $dada
     * @return mixed
     */
    public function save(array $dada);
}