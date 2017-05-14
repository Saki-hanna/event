<?php

namespace AppBundle\Manager;


class EventManager extends ControllerManager
{

    public function getAll($entity)
    {
        return $this->getRepository(ucfirst ($entity))->findAll();
    }

    public function getOne($entity, $id)
    {
        return $this->getRepository(ucfirst ($entity))->find($id);
    }



}
