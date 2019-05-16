<?php

namespace App\SoftStore\Infrastructure\Service\Authentication;

use App\SoftStore\Domain\Service\Authentication\AuthenticationServiceInterface;
use App\SoftStore\Infrastructure\Repository\Authentication\AuthenticationRepository;
use App\SoftStore\System\DI\DependencyInjection;

class AuthenticationService implements AuthenticationServiceInterface
{
    private $authenticationRepository;

    public function __construct()
    {
        $this->authenticationRepository = DependencyInjection::getRepository(AuthenticationRepository::class);
    }

    public function find()
    {
        var_dump($this->authenticationRepository->findBy(['login', 'id'],null,' ORDER BY id DESC'));
    }
}