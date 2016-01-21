<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 22:17
 */
use function DI\object;
use PhpAmqpLib\Connection\AMQPStreamConnection;

$builder = new \DI\ContainerBuilder();

$builder->addDefinitions(__DIR__.'/config.php');

/**
 * Main services
 */
$services = [
    Application\Interfaces\MO::class => object(Application\Services\MO\MO::class),
    Application\Interfaces\MOStatistics::class => object(Application\Services\MO\Statistics::class),
    Application\Interfaces\Response::class => object(Application\Services\JSONResponse::class),
    Application\Interfaces\DelayedJobs::class => object(Application\Services\DelayedJobs\DelayedJobs::class),
    Application\Interfaces\Storage::class => object(Application\Services\Storage\Storage::class),
    \PDO::class => function(\DI\Container $container) {
        $pdo = new \PDO(
            "mysql:host=". $container->get('db.host') .";dbname=". $container->get('db.name'),
            $container->get('db.user'),
            $container->get('db.password')
        );

        return $pdo;
    },
    AMQPStreamConnection::class => function(\DI\Container $c){
        $connection = new AMQPStreamConnection($c->get('rabbit.host'), $c->get('rabbit.port'), $c->get('rabbit.user'), $c->get('rabbit.password'));
        return $connection;
    }
];

$builder->addDefinitions($services);
$di = $builder->build();

\Application\BaseFactory::setDIContainer($di);





