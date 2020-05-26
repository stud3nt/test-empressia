<?php

namespace App\Factory;

use App\Entity\Apartment;
use App\Entity\ApartmentReservation;

class ApartmentReservationFactory
{
    public static function createReservation(Apartment $apartment, \DateTime $dateStart, \DateTime $dateEnd, int $peoplesNumber = 1): ApartmentReservation
    {
        return (new ApartmentReservation())
            ->setApartment($apartment)
            ->setReservationStart($dateStart)
            ->setReservationEnd($dateEnd)
            ->setPeoplesNumber($peoplesNumber);
    }
}