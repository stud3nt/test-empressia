<?php

namespace App\Repository;

use App\Entity\Apartment;
use App\Entity\ApartmentReservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApartmentReservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApartmentReservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApartmentReservation[]    findAll()
 * @method ApartmentReservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApartmentReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApartmentReservation::class);
    }

    /**
     * Gets active (today's or future) reservations for specified apartment
     *
     * @param Apartment $apartment
     * @return array|null
     */
    public function getApartmentActiveReservations(Apartment $apartment, ?\DateTimeInterface $reservationStart = null, ?\DateTimeInterface $reservationEnd = null): ?array
    {
        $qb = $this->_em->createQueryBuilder()
            ->select('r.reservationStart', 'r.reservationEnd', 'r.peoplesNumber')
            ->from('App:ApartmentReservation', 'r')
            ->where('r.apartment = :apartment')
            ->andWhere('r.reservationEnd >= :currentDate')
            ->setParameter('apartment', $apartment)
            ->setParameter('currentDate', (new \DateTime()))
        ;

        if ($reservationStart && $reservationEnd)
            $qb->andWhere('(r.reservationEnd >= :reservationStart AND r.reservationStart <= :reservationEnd)')
                ->setParameter('reservationStart', $reservationStart)
                ->setParameter('reservationEnd', $reservationEnd);


        return $qb->getQuery()
            ->getArrayResult()
        ;
    }
}
