<?php

//namespace src\models;
class Flight
{
    private $flightInfo;
    private $state;
    private $id;

    public function __construct(
        string $info,
        string $state,
        string $id
    )
    {
        $this->flightInfo = $info;
        $this->state = $state;
        $this->id = $id;
    }

    public function getFlightInfo(): string
    {
        return $this->flightInfo;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }

    public function getId(): int
    {
        return $this->id;
    }
}