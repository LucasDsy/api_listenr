<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


class Playlist
{
    /**
     * @var int
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
     * @var array
     * @ORM\ManyToMany(targetEntity="Music")
     * @ORM\JoinTable(name="playlist_musics")
     */
    private array $musics;

    /**
     * Playlist constructor.
     * @param int $id
     * @param string $name
     * @param array $musics
     */
    public function __construct(int $id, string $name, array $musics)
    {
        $this->id = $id;
        $this->name = $name;
        $this->musics = $musics;
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

}