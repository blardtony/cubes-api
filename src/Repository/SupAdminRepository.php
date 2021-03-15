<?php

namespace App\Repository;

use App\Entity\SupAdmin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SupAdmin|null find($id, $lockMode = null, $lockVersion = null)
 * @method SupAdmin|null findOneBy(array $criteria, array $orderBy = null)
 * @method SupAdmin[]    findAll()
 * @method SupAdmin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SupAdminRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SupAdmin::class);
    }

    // /**
    //  * @return SupAdmin[] Returns an array of SupAdmin objects
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
    public function findOneBySomeField($value): ?SupAdmin
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
