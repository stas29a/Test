<?php
require __DIR__."/vendor/autoload.php";
require __DIR__."/bootstrap.php";

/** @var \Application\App $app */
$app = \Application\BaseFactory::getInstance(Application\App::class);
$app->setRequest($_REQUEST);
$app->setAction(\Application\BaseFactory::getInstance(Application\Actions\ProcessMO::class));
$app->run();
