<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 18.01.16
 * Time: 22:48
 */

namespace Application\Services\DelayedJobs;


use Application\Entities\DelayedJob;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class DelayedJobs implements \Application\Interfaces\DelayedJobs
{
    protected $connection;
    protected $channel;

    public function __construct(AMQPStreamConnection $connection)
    {
        $this->connection = $connection;
        $this->channel = $this->connection->channel();
    }

    public function publish(DelayedJob $delayedJob)
    {
        $this->channel->queue_declare('jobs', false, false, false, false);

        $msg = new AMQPMessage(json_encode($delayedJob->jsonSerialize()));
        $this->channel->basic_publish($msg, '', 'jobs');
    }

    public function subscribe(callable $callback)
    {
        $this->channel->queue_declare('jobs', false, false, false, false);

        $tmpCallback = function($msg) use($callback) {
            call_user_func($callback, json_decode($msg->body, true));
        };

        $this->channel->basic_consume('jobs', '', false, true, false, false, $tmpCallback);

        while(count($this->channel->callbacks)) {
            $this->channel->wait();
        }
    }

    public function __destruct()
    {
        $this->connection->close();
        $this->channel->close();
    }
}