<?php

namespace App\SoftStore\System\Database;

abstract class EntityRepository
{
    private $connect;
    private $entity;

    public function __construct(string  $entity)
    {
        $this->connect = DatabaseConnect::init();
        $this->entity  = $entity;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function findAll()
    {
        try {
            $all = $this->connect->query("SELECT * FROM {$this->entity}")->fetchAll(
                \PDO::FETCH_ASSOC
            );
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }

        return $all;
    }

    /**
     * @param array $fields
     * @param string|null $where
     * @param string|null $orderBy
     * @param string|null $limit
     * @return array
     * @throws \Exception
     */
    public function findBy(array $fields, string $where = null, string $orderBy = null, string $limit = null)
    {
        $filter = implode(',', $fields);

        $where   = $where   ?? '';
        $orderBy = $orderBy ?? '';
        $limit   = $limit   ?? '';

        if (empty($filter)) {
            $filter = "*";
        }

        try {
            return $this->connect->query(
                "SELECT {$filter} FROM {$this->entity} {$where} {$orderBy} {$limit}")
                ->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * @param string $sql
     * @return array
     * @throws \Exception
     */
    public function createQueryBuilder(string $sql)
    {
        try {
            return $this->connect->query($sql)->fetchAll();
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    public function getConnectionManager()
    {
        return $this->connect;
    }
}