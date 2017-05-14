<?php
namespace AppBundle\Manager;


use Doctrine\ORM\EntityManager;

abstract class ControllerManager
{
    protected $em;

    public function __construct( EntityManager $em )
    {
        $this->em = $em;
    }

    public function getRepository($entity)
    {
        return $this->em->getRepository('AppBundle:' . $entity);
    }

    public function save( $entity )
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    public function edit()
    {
        $this->em->flush();
    }

    public function remove( $entity )
    {
        $this->em->remove($entity);
        $this->em->flush();
    }



}