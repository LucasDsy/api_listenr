<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Groups({"get"})
     */
    private string $title;

    /**
     * @var int
     * @ORM\Column(type="integer")
     * Duration in seconds
     */
    private int $duration;

    /**
     * @var Artist
     * @ORM\ManyToOne(targetEntity="Artist")
     * @Groups({"get"})
     */
    private Artist $artist;

    /**
     * @var Album
     * @ORM\ManyToOne(targetEntity="Album")
     */
    private Album $album;

    /**
     * Music constructor.
     */
    public function __construct() {}

    /**
     * Music Factory
     * @param string $title
     * @param int $duration
     * @param Artist $artist
     * @param Album $album
     * @return Music
     */
    public static function create(string $title, int $duration, Artist $artist, Album $album)
    {
        $music = new self();
        $music->title = $title;
        $music->duration = $duration;
        $music->artist = $artist;
        $music->album = $album;

        return $music;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return integer
     */
    public function getDuration(): int
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
     * SETTERS
     */

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param int $duration
     */
    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @param Artist $artist
     */
    public function setArtist(Artist $artist): void
    {
        $this->artist = $artist;
    }
    /**
     * @param Album $album
     */
    public function setAlbum(Album $album): void
    {
        $this->album = $album;
    }

}