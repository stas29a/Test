<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 18.01.16
 * Time: 22:48
 */

namespace Application\Interfaces;


use Application\Entities\DelayedJob;

interface DelayedJobs
{
    public function publish(DelayedJob $delayedJob);
    public function subscribe(callable $callback);
}