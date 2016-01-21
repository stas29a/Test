<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 23:29
 */

namespace Application;

use Application\Interfaces\DIInjectable;
use DI\Container;

class BaseFactory
{
    /** @var Container  */
    protected static $di;

    public static function setDIContainer($di)
    {
        self::$di = $di;
    }

    public static function getInstance($className)
    {
        $obj = new $className;

        if($obj instanceof DIInjectable)
            $obj->setDI(self::$di);

        self::$di->injectOn($obj);

        return $obj;
    }
}