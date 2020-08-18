<?php

namespace App\Repository;

use App\Entity\ProjectPresentation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProjectPresentation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectPresentation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectPresentation[]    findAll()
 * @method ProjectPresentation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectPresentationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjectPresentation::class);
    }

    // /**
    //  * @return ProjectPresentation[] Returns an array of ProjectPresentation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProjectPresentation
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
