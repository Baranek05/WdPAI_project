<?php

//namespace src\models;
class User
{
    private $login;
    private $password;
    private $name;
    private $surname;
    private $jobDetails;

    public function __construct(
        string $login,
        string $password,
        string $name,
        string $surname
    )
    {
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getJobDetails()
    {
        return $this->jobDetails;
    }
}