<?php

namespace App\Repository;

use App\Entity\Supplément;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Supplément>
 *
 * @method Supplément|null find($id, $lockMode = null, $lockVersion = null)
 * @method Supplément|null findOneBy(array $criteria, array $orderBy = null)
 * @method Supplément[]    findAll()
 * @method Supplément[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SupplémentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Supplément::class);
    }

    //    /**
    //     * @return Supplément[] Returns an array of Supplément objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Supplément
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
