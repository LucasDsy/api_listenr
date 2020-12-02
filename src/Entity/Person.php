<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;


class Person
{

    /**
     * @var int
     * @ORM\Column(type='integer')
     * @ORM\GeneratedValue()
     */
    private int $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private string $firstname;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private string $lastname;

    /**
     * @var DateTimeInterface
     * @ORM\Column(type="datetime_immutable")
     */
    private DateTimeInterface $birthdate;

    /**
     * Person constructor.
     * @param $firstname
     * @param $lastname
     * @param $birthdate
     */
    public function __construct(string $firstname, string $lastname, DateTimeInterface $birthdate)
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
     * @return DateTimeInterface
     */
    public function getBirthdate(): DateTimeInterface
    {
        return $this->birthdate;
    }

}