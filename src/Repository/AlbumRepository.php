<?php


namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Album;

/**
 * Class AlbumRepository
 * @package App\Repository
 */
class AlbumRepository extends ServiceEntityRepository
{
    /**
     * AlbumRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Album::class);
    }
}