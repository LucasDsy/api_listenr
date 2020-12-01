<?php


namespace App\Entity;


class Artist extends Person
{
    /**
     * @var string
     */
    private string $alias;

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * Artist constructor.
     * @param string $firstname
     * @param string $lastname
     * @param string $birthdate
     * @param string $alias
     */
    public function __construct(string $firstname, string $lastname, string $birthdate, string $alias)
    {
        parent::__construct($firstname, $lastname, $birthdate);
        $this->alias = $alias;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return parent::getId();
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return parent::getFirstname();
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return parent::getLastname();
    }

    /**
     * @return \DateTimeInterface
     */
    public function getBirthdate(): \DateTimeInterface
    {
        return parent::getBirthdate();
    }


}