<?php


namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Music;

/**
 * Class MusicRepository
 * @package App\Repository
 */
class MusicRepository extends ServiceEntityRepository
{
    /**
     * MusicRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Music::class);
    }
}