<?php

namespace App\SoftStore\Infrastructure\Repository\Authentication;

use App\SoftStore\Domain\Entity\Authentication;
use App\SoftStore\Domain\Repository\Authentication\AuthenticationRepositoryInterface;
use App\SoftStore\System\Database\DatabaseConnect;
use App\SoftStore\System\Database\EntityRepository;

class AuthenticationRepository extends EntityRepository implements AuthenticationRepositoryInterface
{
    public function __construct()
    {
        parent::__construct('authentications');
    }

    /**
     * @param string $login
     * @return bool
     * @throws \Exception
     */
    public function authentication(string $login)
    {
        try {
            $sql = "SELECT auth.id, auth.login, auth.password,cus.nome, cus.id  as customer_id, cus.registrado_em FROM authentications auth 
                    INNER JOIN customers cus ON auth.id = cus.id_authentication WHERE auth.login = :login";
            $stmt = $this->getConnectionManager()
                         ->prepare($sql);
            $stmt->bindParam(":login", $login);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}