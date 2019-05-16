<?php

namespace App\SoftStore\System\Database;

abstract class DatabaseConnect
{
    private $config;

    public function __construct()
    {
        $this->config = $this->getConfig();
    }

    /**
     * @return \PDO
     * @throws \Exception
     */
    public static function init()
    {
        $config = self::getConfig();

        try {
            return new \PDO("pgsql:host={$config['host']};port=5432;dbname={$config['dbName']};
            user={$config['user']};password={$config['password']}");
        } catch (\PDOException $PDOException) {
            throw new \Exception($PDOException->getMessage());
        }
    }

    private static function getConfig()
    {
        $config = include __DIR__.'/../../config/autoload/database.config.php';
        return $config['postgresql'];
    }
}