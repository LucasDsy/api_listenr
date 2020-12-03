<?php


namespace App\Entity;

use DateInterval;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Album
 * @package App\Entity
 * @ORM\Entity
 */
class Album
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
     * @var int
     * @ORM\Column(type="integer")
     */
    private int $duration;

    /**
     * @var Artist
     * @ORM\ManyToOne(targetEntity="Artist")
     */
    private Artist $artist;

    /**
     * Album constructor.
     */
    public function __construct() {}

    /**
     * Album Factory
     * @param string $name
     * @param int $duration
     * @param Artist $artist
     * @return Album
     */
    public static function create(string $name, int $duration, Artist $artist)
    {
        $album = new self();
        $album->name = $name;
        $album->duration = $duration;
        $album->artist = $artist;

        return $album;
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