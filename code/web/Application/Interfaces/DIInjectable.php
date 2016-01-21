<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 23:40
 */

namespace Application\Interfaces;

use DI\Container;

interface DIInjectable
{
    public function setDI(Container $di);
}