<?php


namespace App\Entity;


class Playlist
{
    /**
     * @var int
     */
    private integer $id;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var array
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