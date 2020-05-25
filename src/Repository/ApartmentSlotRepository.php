<?php

namespace App\Repository;

use App\Entity\ApartmentSlot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApartmentSlot|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApartmentSlot|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApartmentSlot[]    findAll()
 * @method ApartmentSlot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApartmentSlotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApartmentSlot::class);
    }

    // /**
    //  * @return ApartmentSlot[] Returns an array of ApartmentSlot objects
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
    public function findOneBySomeField($value): ?ApartmentSlot
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
