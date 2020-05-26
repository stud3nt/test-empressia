<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Manager\UserManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UserFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
{
    /** @var ContainerInterface */
    private $container;

    /** @var UserManager */
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 6; $i++) {
            $user = (new User())
                ->setFirstName('Jan'.$i)
                ->setLastName('Testowy'.$i)
                ->setEmail('testowy_mail_'.$i.'@test.pl')
                ->setPhone((string)rand(600000000, 8000000))
                ->setRoles(['ROLE_USER']);

            $this->userManager->setUserPassword($user, '123456');

            $manager->persist($user);
        }

        $manager->flush();
    }
}
