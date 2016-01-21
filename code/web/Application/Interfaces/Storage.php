<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 18.01.16
 * Time: 23:44
 */

namespace Application\Interfaces;


interface Storage
{
    public function getRepository($entityName);
    public function save(Entity $entity);
}