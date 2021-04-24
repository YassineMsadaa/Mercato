<?php

namespace App\Repository;

use App\Entity\Surfer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Surfer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Surfer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Surfer[]    findAll()
 * @method Surfer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SurferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Surfer::class);
    }


}
