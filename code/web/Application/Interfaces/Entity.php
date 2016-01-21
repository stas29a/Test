<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 18.01.16
 * Time: 23:50
 */

namespace Application\Interfaces;


interface Entity
{
    public function getNamespace();
    public function fromArray(array $data);
    public function toArray();
}