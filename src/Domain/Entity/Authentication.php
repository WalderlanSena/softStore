<?php

namespace App\SoftStore\Domain\Entity;

class Authentication
{
    private $id;
    private $login;
    private $password;

    public function __construct(string $id, string $login, string $password)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = password_hash($password, PASSWORD_ARGON2I);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
}