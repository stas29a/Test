<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 19.01.16
 * Time: 0:55
 */
require __DIR__."/vendor/autoload.php";
require __DIR__."/bootstrap.php";

/** @var \Application\Daemon $app */
$app = \Application\BaseFactory::getInstance(\Application\Daemon::class);
$app->run();
