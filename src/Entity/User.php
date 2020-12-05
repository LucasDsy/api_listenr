<?php


namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @var Music[]|Collection
     * @ORM\ManyToMany(targetEntity="Music")
     * @ORM\JoinTable(name="musics_liked")
     * List of Musics
     */
    private Collection $musicsLiked;

    /**
     * @var Playlist[]|Collection
     * @ORM\ManyToMany(targetEntity="Playlist")
     * @ORM\JoinTable(name="list_playlists")
     * List of PlayLists
     */
    private Collection $playlists;

    /**
     * User constructor.
     */
    public function __construct() {
        $this->musicsLiked = new ArrayCollection();
        $this->playlists = new ArrayCollection();
    }

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
     * @return Collection
     */
    public function getMusicsLiked(): Collection
    {
        return $this->musicsLiked;
    }

    /**
     * @return Collection
     */
    public function getPlaylists(): Collection
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

    /**
     * FUNCTIONS
     */

    /**
     * @param Playlist $playlist
     */
    public function playlistAdded(Playlist $playlist): void
    {
        if ($playlist != null && !$this->playlists->contains($playlist))
            $this->playlists->add($playlist);
    }

    /**
     * @param Playlist $playlist
     */
    public function playlistRemoved(Playlist $playlist): void
    {
        if ($this->playlists->contains($playlist))
            $this->playlist->remove($playlist);
    }

    /**
     * @param Music $music
     */
    public function musicLikedAdded(Music $music): void
    {
        if ($music != null && !$this->musicsLiked->contains($music))
            $this->musicsLiked->add($music);
    }

    /**
     * @param Music $music
     */
    public function musicLikedRemoved(Music $music): void
    {
        if ($this->musicsLiked->contains($music))
            $this->musicsLiked->remove($music);
    }


}