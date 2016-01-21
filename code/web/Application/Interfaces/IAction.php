<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 23:25
 */

namespace Application\Interfaces;


interface IAction
{
    public function setRequest(array $request);
    public function run();
}