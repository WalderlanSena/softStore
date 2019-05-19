<?php

namespace App\SoftStore\Domain\Repository\Authentication;

interface AuthenticationRepositoryInterface
{
    public function findAll();

    public function authentication(string $login);
}