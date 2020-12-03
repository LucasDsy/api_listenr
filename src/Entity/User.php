<?php


namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User
 * @package App\Entity
 * @ORM\Entity
 */
class User implements UserInterface
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private int $id;

    /**
     * @var string
     * @ORM\Column(type="string",unique=true)
     */
    private string $name;

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
     */
    public function __construct() {}

    /**
     * User Factory
     * @param string $name
     * @param string $email
     * @return User
     */
    public static function create(string $name, string $email) {
        $user = new self();
        $user->name = $name;
        $user->email  = $email;

        return $user;
    }

    /**
     * GETTERS
     */

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
    public function getName(): string
    {
        return $this->name;
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

    /**
     * SETTERS
     */

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
       $this->name = $name;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param array $musicsLiked
     */
    public function setMusicsLiked(array $musicsLiked): void
    {
        $this->musicsLiked = $musicsLiked;
    }

    /**
     * @param array $playlists
     */
    public function setPlaylists(array $playlists): void
    {
        $this->playlists = $playlists;
    }

    /**
     * USER INTERFACE METHODS
     */

    public function getRoles()
    {
        return ['BASIC_USER'];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }


}