<?php


namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Artist
 * @package App\Entity
 * @ORM\Entity
 */
class Artist
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
    private string $alias;

    /**
     * Artist constructor.
     */
    public function __construct() {}

    /**
     * Artist Factory
     * @param $alias
     * @return Artist
     */
    public static function create(string $alias)
    {
        $artist = new self();
        $artist->alias = $alias;

        return $artist;
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
    public function getAlias(): string
    {
        return $this->alias;
    }

}