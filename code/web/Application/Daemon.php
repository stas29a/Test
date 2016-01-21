<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 19.01.16
 * Time: 0:40
 */

namespace Application;


use Application\Interfaces\DIInjectable;
use DI\Container;
use Application\Interfaces\DelayedJobs;

class Daemon implements DIInjectable
{
    /** @var  Container */
    protected $di;

    public function setDI(Container $di)
    {
        $this->di = $di;
    }

    public function run()
    {
        $processCount = $this->di->get('daemon.count');
        for($i=0;$i<$processCount;$i++)
        {
            echo "Forking a new daemon process[". ($i+1) ."]\n";
            $pid = pcntl_fork();

            if(!$pid) //if it's child process
            {
                /** @var DelayedJobs $delayedJobs */
                $delayedJobs = $this->di->get(DelayedJobs::class);
                $delayedJobs->subscribe([$this, 'onJob']);
            }
        }
    }

    public function onJob($arJob)
    {
        echo "Got a new job ".$arJob['handler'];

        /** @var \Application\Interfaces\Job $job */
        $job = BaseFactory::getInstance($arJob['handler']);

        $job->process($arJob['data']);

        echo $arJob['handler']." was executed\n";
    }
}