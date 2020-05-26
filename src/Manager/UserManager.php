<?php

namespace App\Manager;

use App\Entity\User;
use App\Manager\Base\EntityManager;
use App\Repository\UsersRepository;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class UserManager extends EntityManager
{
    /** @var UsersRepository */
    protected $repository;

    protected $entityName = 'User';

    /** @var EncoderFactoryInterface */
    protected $encoderFactory;

    /** @required */
    public function setPasswordEncoder(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    public function setUserPassword(User &$user, string $plainPassword): User
    {
        return $user->setPassword(
            $this->encoderFactory->getEncoder($user)->encodePassword($plainPassword, $user)
        );
    }
}
