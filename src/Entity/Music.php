<?php


namespace App\Entity;

use DateInterval;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Music
 * @package App\Entity
 * @ORM\Entity
 */
class Music
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private int $id;

    /***
     * @var string
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @var DateInterval
     * @ORM\Column(type="time")
     */
    private DateInterval $duration;

    /**
     * @var Artist
     * @ORM\ManyToOne(targetEntity="Artist")
     */
    private Artist $artist;

    /**
     * @var Album
     * @ORM\ManyToOne(targetEntity="Album")
     */
    private Album $album;

    /**
     * Music constructor.
     * @param int $id
     * @param string $name
     * @param DateInterval $duration
     * @param Artist $artist
     */
    public function __construct(int $id, string $name, DateInterval $duration, Artist $artist)
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
     * @return DateInterval
     */
    public function getDuration(): DateInterval
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
     * @param Album $album
     */
    public function setAlbum(Album $album): void
    {
        $this->album = $album;
    }

}