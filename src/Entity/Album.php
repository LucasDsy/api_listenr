<?php


namespace App\Entity;

use DateInterval;
use Doctrine\ORM\Mapping as ORM;


class Album
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
     * @var DateInterval
     * @ORM\Column(type="timestamp")
     */
    private DateInterval $duration;

    /**
     * @var Artist
     * @ORM\ManyToOne(targetEntity='Artist')
     */
    private Artist $artist;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity='Music')
     */
    private array $musics;

    /**
     * Album constructor.
     * @param int $id
     * @param string $name
     * @param DateInterval $duration
     * @param Artist $artist
     * @param array $musics
     */
    public function __construct(int $id, string $name, DateInterval $duration, Artist $artist, array $musics)
    {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
        $this->artist = $artist;
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



}