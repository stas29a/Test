<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 23:54
 */

namespace Application\Interfaces;


interface Response
{
    public function setData($data);
    public function send();
}