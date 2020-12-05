<?php


namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use function Sodium\add;

/**
 * Class Playlist
 * @package App\Entity
 * @ORM\Entity
 */
class Playlist
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
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @var User
     */
    private User $creator;

    /**
     * @var Music[]|Collection
     * @ORM\ManyToMany(targetEntity="Music")
     * @ORM\JoinTable(name="playlist_musics")
     */
    private Collection $musics;

    /**
     * Playlist constructor.
     */
    public function __construct() {
        $this->musics = new ArrayCollection();
    }

    /**
     * Playlist Factory
     * @param string $name
     * @param User $creator
     * @return Playlist
     */
    public static function create(string $name, User $creator)
    {
        $playlist = new self();
        $playlist->name = $name;
        $playlist->creator = $creator;

        return $playlist;
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
     * @return array
     */
    public function getMusics(): array
    {
        return $this->musics;
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
     * @param User $creator
     */
    public function setCreator(User $creator): void
    {
        $this->creator = $creator;
    }

    /**
     * FUNCTIONS
     */

    /**
     * @param Music $music
     */
    public function musicAdded(Music $music): void
    {
        if ($music != null && !$this->musics->contains($music))
            $this->musics->add($music);
    }

    /**
     * @param Music $music
     */
    public function musicRemoved(Music $music): void
    {
        if ($this->musics->contains($music))
            $this->musics->remove($music);
    }

}