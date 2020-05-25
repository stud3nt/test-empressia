<?php

namespace App\Manager\Base;

use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

abstract class EntityManager
{
    protected $entityName;

    /**  @var \Doctrine\ORM\EntityManager */
    protected $em;

    protected $repository;
    protected $namespace;

    public function __construct(\Doctrine\ORM\EntityManagerInterface $em, TokenStorageInterface $tokenStorage)
    {
        $this->em = $em;
        $this->repository = $this->em->getRepository(sprintf('App:%s%s', $this->namespace, $this->entityName));
    }

    public function getBy(Array $criteria = [], $orderBy = ['id' => 'desc'])
    {
        return $this->repository->findBy($criteria, $orderBy);
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }

    public function getOneBy(Array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    public function remove($entity)
    {
        try {
            $this->em->remove($entity);
        } catch (ORMException $e) {

        }

        try {
            $this->em->flush();
        } catch (OptimisticLockException $e) {

        } catch (ORMException $e) {

        }
    }

    public function save($entity)
    {
        try {
            $this->em->persist($entity);
        } catch (ORMException $e) {

        }

        try {
            $this->em->flush();
        } catch (OptimisticLockException $e) {

        } catch (ORMException $e) {

        }

        return $entity;
    }
}
