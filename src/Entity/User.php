<?php


namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package App\Entity
 * @ORM\Entity
 */
class User extends Person
{

    /**
     * @var string
     * @ORM\Column(type="string",unique=true)
     */
    private string $email;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private string $password;

    /**
     * @var array
     * @ORM\ManyToMany(targetEntity="Music")
     * @ORM\JoinTable(name="musics_liked")
     * List of Musics
     */
    private array $musicsLiked;

    /**
     * @var array
     * @ORM\ManyToMany(targetEntity="Playlist")
     * @ORM\JoinTable(name="list_playlists")
     * List of PlayLists
     */
    private array $playlists;

    /**
     * User constructor.
     * @param string $firstname
     * @param string $lastname
     * @param DateTimeInterface $birthdate
     * @param string $email
     * @param string $password
     */
    public function __construct(string $firstname, string $lastname, DateTimeInterface $birthdate, string $email, string $password)
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
     * @return DateTimeInterface
     */
    public function getBirthdate(): DateTimeInterface
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
    public function getListening(): Music
    {
        return $this->listening;
    }

}