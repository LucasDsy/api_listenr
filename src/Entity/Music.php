<?php


namespace App\Entity;


class Music
{

    /**
     * @var int
     */
    private integer $id;

    /***
     * @var string
     */
    private string $name;

    /**
     * @var \DateInterval
     */
    private \DateInterval $duration;

    /**
     * @var Artist
     */
    private Artist $artist;

    /**
     * @var Album
     */
    private Album $album;

    /**
     * Music constructor.
     * @param int $id
     * @param string $name
     * @param \DateInterval $duration
     * @param Artist $artist
     */
    public function __construct(int $id, string $name, \DateInterval $duration, Artist $artist)
    {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
        $this->artist = $artist;
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
     * @return \DateInterval
     */
    public function getDuration(): \DateInterval
    {
        return $this->duration;
    }

    /**
     * @return Artist
     */
    public function getArtist(): Artist
    {
        return $this->artist;
    }

    /**
     * @return Album
     */
    public function getAlbum(): Album
    {
        return $this->album;
    }

    /**
     * @param Album $album
     */
    public function setAlbum(Album $album): void
    {
        $this->album = $album;
    }

}