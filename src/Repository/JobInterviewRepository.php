<?php

namespace App\Repository;

use App\Entity\JobInterview;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobInterview|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobInterview|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobInterview[]    findAll()
 * @method JobInterview[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobInterviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobInterview::class);
    }

    // /**
    //  * @return JobInterview[] Returns an array of JobInterview objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JobInterview
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
