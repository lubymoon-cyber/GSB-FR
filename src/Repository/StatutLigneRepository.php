<?php

namespace App\Repository;

use App\Entity\StatutLigne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StatutLigne|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatutLigne|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatutLigne[]    findAll()
 * @method StatutLigne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatutLigneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatutLigne::class);
    }

    // /**
    //  * @return StatutLigne[] Returns an array of StatutLigne objects
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
    public function findOneBySomeField($value): ?StatutLigne
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
