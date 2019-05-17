<?php

namespace App\SoftStore\Infrastructure\Service\Authentication;

use App\SoftStore\Domain\Service\Authentication\AuthenticationServiceInterface;
use App\SoftStore\Infrastructure\Repository\Authentication\AuthenticationRepository;
use App\SoftStore\System\DI\DependencyInjection;
use App\SoftStore\System\Session\SessionHandler;

class AuthenticationService implements AuthenticationServiceInterface
{
    private $authenticationRepository;

    public function __construct()
    {
        $this->authenticationRepository = DependencyInjection::getRepository(AuthenticationRepository::class);
    }

    public function authenticate(string $login, string $password)
    {
        $login = filter_var($login, FILTER_SANITIZE_STRING);
        $senha = filter_var($password, FILTER_SANITIZE_STRING);

        try {
           $user = $this->authenticationRepository->findBy([]," WHERE login = '{$login}'");
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }

        if (count($user) < 1 || !password_verify($senha, $user[0]['password'])) {
            throw new \Exception('Usuário ou senha ínvalido !');
        }

        SessionHandler::setSession('user', $user[0]);

        return $user[0] ?? $user;
    }
}