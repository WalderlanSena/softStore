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
}