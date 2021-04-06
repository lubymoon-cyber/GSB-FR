<?php

namespace App\Repository;

use App\Entity\EtatFiche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EtatFiche|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtatFiche|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtatFiche[]    findAll()
 * @method EtatFiche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatFicheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtatFiche::class);
    }

    // /**
    //  * @return EtatFiche[] Returns an array of EtatFiche objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EtatFiche
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
