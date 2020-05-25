<?php

namespace App\Manager;

use App\Entity\Apartment;
use App\Manager\Base\EntityManager;
use App\Repository\ApartmentRepository;

class ApartmentManager extends EntityManager
{
    protected $entityName = 'Apartment';

    /** @var ApartmentRepository */
    protected $repository;

    /**
     * Gets apartments list with available slots/rooms count;
     *
     * @return Apartment[]
     */
    public function getApartmentsList(): array
    {
        $apartments = [];
        $rawList = $this->repository->getAvailableApartmentsQb()->getQuery()->getResult();

        if ($rawList) {
            /** @var Apartment $apartment */
            foreach ($rawList as $key => $row) {
                $apartment = $row[0];
                $apartment->setActualPeoplesCount($row['actualPeoplesCount']);

                $apartments[$key] = $apartment;
            }
        }

        return $apartments;
    }
}
