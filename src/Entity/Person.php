<?php

namespace App\Entity;

class Person
{

    /**
     * @var int
     */
    private integer $id;

    /**
     * @var string
     */
    private string $firstname;

    /**
     * @var string
     */
    private string $lastname;

    /**
     * @var \DateTimeInterface
     */
    private \DateTimeInterface $birthdate;

    /**
     * Person constructor.
     * @param $firstname
     * @param $lastname
     * @param $birthdate
     */
    public function __construct(string $firstname, string $lastname, string $birthdate)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthdate = $birthdate;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getBirthdate(): \DateTimeInterface
    {
        return $this->birthdate;
    }

}