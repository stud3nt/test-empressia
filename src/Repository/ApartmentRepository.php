<?php

namespace App\Repository;

use App\Entity\Apartment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Apartment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Apartment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Apartment[]    findAll()
 * @method Apartment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApartmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Apartment::class);
    }

    public function getAvailableApartmentsQb(): QueryBuilder
    {
        return $this->_em->createQueryBuilder()
            ->select('a')
            ->addSelect('COALESCE(SUM(r.peoplesNumber), 0) as actualPeoplesCount')
            ->from('App:Apartment', 'a')
            ->leftJoin(
                'a.reservations',
                'r',
                Expr\Join::WITH,
                'r.apartment = a AND (r.reservationStart <= :currentDate AND r.reservationEnd >= :currentDate)'
            )
            ->setParameter('currentDate', (new \DateTime()))
            ->groupBy('a.id');
    }
}
