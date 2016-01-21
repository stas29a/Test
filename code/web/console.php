<?php
require __DIR__."/vendor/autoload.php";
require __DIR__."/bootstrap.php";

use function DI\object;

$di->set(\Application\Interfaces\Response::class, object(\Application\Services\PlainResponse::class));

/** @var \Application\App $app */
$app = \Application\BaseFactory::getInstance(Application\App::class);
$app->setRequest($_REQUEST);
$app->setAction(\Application\BaseFactory::getInstance("Application\\Actions\\".$argv[1]));
$app->run();
