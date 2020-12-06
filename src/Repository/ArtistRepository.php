<?php


namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Artist;

/**
 * Class ArtistRepository
 * @package App\Repository
 */
class ArtistRepository extends ServiceEntityRepository
{
    /**
     * ArtistRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artist::class);
    }
}