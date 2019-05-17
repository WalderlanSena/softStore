<?php

namespace App\SoftStore\Domain\Service\Authentication;

interface AuthenticationServiceInterface
{
    public function authenticate(string $login, string $password);
}