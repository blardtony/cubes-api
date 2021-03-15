<?php

namespace App\Repository;

use App\Entity\Synopsis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Synopsis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Synopsis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Synopsis[]    findAll()
 * @method Synopsis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SynopsisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Synopsis::class);
    }

    // /**
    //  * @return Synopsis[] Returns an array of Synopsis objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Synopsis
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
