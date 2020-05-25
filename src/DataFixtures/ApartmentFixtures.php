<?php

namespace App\DataFixtures;

use App\Entity\Apartment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ApartmentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($a = 1; $a <= 14; $a++) {
            $apartment = (new Apartment())
                ->setName('Mieszkanie '.$a)
                ->setDescription('Mieszkanie '.$a.' Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam')
                ->setSlotDayPrice(rand(40, 80))
                ->setSlotsCount(rand(1, 5));

            $manager->persist($apartment);
        }

        $manager->flush();
    }
}
