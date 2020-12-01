<?php


namespace App\Entity;


class User extends Person
{

    /**
     * @var string
     */
    private string $email;

    /**
     * @var string
     */
    private string $password;

    /**
     * @var array
     * List of Musics
     */
    private array $musicsLiked;

    /**
     * @var array
     * List of PlayLists
     */
    private array $playlists;

    /**
     * @var Music
     */
    private Music $listenning;

    /**
     * User constructor.
     * @param string $firstname
     * @param string $lastname
     * @param string $birthdate
     * @param string $email
     * @param string $password
     */
    public function __construct(string $firstname, string $lastname, string $birthdate, string $email, string $password)
    {
        parent::__construct($firstname, $lastname, $birthdate);
        $this->email = $email;
        $this->password = $password;
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

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function getMusicsLiked(): array
    {
        return $this->musicsLiked;
    }

    /**
     * @return array
     */
    public function getPlaylists(): array
    {
        return $this->playlists;
    }

    /**
     * @return Music
     */
    public function getListenning(): Music
    {
        return $this->listenning;
    }

}