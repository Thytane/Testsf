<?php

namespace App\Repository;

use App\Entity\AddressCallLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AddressCallLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method AddressCallLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method AddressCallLog[]    findAll()
 * @method AddressCallLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AddressCallLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AddressCallLog::class);
    }

    // /**
    //  * @return AddressCallLog[] Returns an array of AddressCallLog objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AddressCallLog
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
