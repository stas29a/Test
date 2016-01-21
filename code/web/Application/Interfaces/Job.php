<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 19.01.16
 * Time: 0:34
 */

namespace Application\Interfaces;


interface Job
{
    public function process(array $data);
}