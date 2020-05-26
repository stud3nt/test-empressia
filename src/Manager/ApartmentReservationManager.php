<?php

namespace App\Manager;

use App\Entity\ApartmentReservation;
use App\Manager\Base\EntityManager;
use App\Repository\ApartmentReservationRepository;

class ApartmentReservationManager extends EntityManager
{
    protected $entityName = 'ApartmentReservation';

    /** @var ApartmentReservationRepository */
    protected $repository;

    // 15% discount;
    static $sevenDaysDiscount = 0.85;

    public function calculateApartmentReservationData(ApartmentReservation $apartmentReservation): array
    {
        $activeReservations = $this->repository->getApartmentActiveReservations(
            $apartmentReservation->getApartment(),
            $apartmentReservation->getReservationStart(),
            $apartmentReservation->getReservationEnd()
        );

        $currentPeoplesNumber = 0;

        if ($activeReservations) {
            foreach ($activeReservations as $activeReservation)
                $currentPeoplesNumber += $activeReservation->getPeoplesNumber();

            if ($currentPeoplesNumber > $apartmentReservation->getPeoplesNumber())
                $apartmentReservation->setErrorMessage('Twoja rezerwacja koliduje z innymi :(');
        }

        $this->calculateReservationPrices($apartmentReservation);

        if ($apartmentReservation->getApartment()->getSlotsCount() < $apartmentReservation->getPeoplesNumber())
            $apartmentReservation->setErrorMessage('Mieszkanie nie posiada dostatecznej liczby miejsc :(');


        return $apartmentReservation->toArray();
    }

    public function calculateReservationPrices(ApartmentReservation &$apartmentReservation): ApartmentReservation
    {
        $reservationDays = $apartmentReservation->getReservationStart()
            ->diff($apartmentReservation->getReservationEnd())
            ->days + 1;

        $rawPrice = ($reservationDays * $apartmentReservation->getPeoplesNumber()) * $apartmentReservation->getApartment()->getSlotDayPrice();
        $paymentWithoutDiscount = round($rawPrice, 2);
        $paymentWithDiscount = ($reservationDays > 7)
            ? (round($paymentWithoutDiscount * self::$sevenDaysDiscount, 2))
            : $paymentWithoutDiscount;

        $apartmentReservation->setReservationDays($reservationDays);
        $apartmentReservation->setPaymentWithoutDiscount($paymentWithoutDiscount);
        $apartmentReservation->setPaymentWithDiscount($paymentWithDiscount);

        return $apartmentReservation;
    }
}
