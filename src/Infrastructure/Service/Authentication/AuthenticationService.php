<?php

namespace App\SoftStore\Infrastructure\Service\Authentication;

use App\SoftStore\Domain\Service\Authentication\AuthenticationServiceInterface;
use App\SoftStore\Infrastructure\Repository\Authentication\AuthenticationRepository;
use App\SoftStore\System\DI\DependencyInjection;
use App\SoftStore\System\Session\SessionHandler;

class AuthenticationService implements AuthenticationServiceInterface
{
    /**
     * @var AuthenticationRepository $authenticationRepository
     */
    private $authenticationRepository;

    public function __construct()
    {
        $this->authenticationRepository = DependencyInjection::getRepository(AuthenticationRepository::class);
    }

    /**
     * @param string $login
     * @param string $password
     * @return bool
     * @throws \Exception
     */
    public function authenticate(string $login, string $password)
    {
        $login    = filter_var($login, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        try {
           $user = $this->authenticationRepository->authentication($login);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }

        if (empty($user) || !password_verify($password, $user['password'] ?? '')) {
            throw new \Exception('Usuário ou senha ínvalido !');
        }

        SessionHandler::setSession('user', $user);

        return $user;
    }
}