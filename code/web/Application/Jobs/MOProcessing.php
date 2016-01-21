<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 18.01.16
 * Time: 22:43
 */

namespace Application\Jobs;

use Application\Entities\MORequest;
use Application\Interfaces\DIInjectable;
use Application\Interfaces\Job;
use Application\Interfaces\MO;
use DI\Container;

class MOProcessing implements Job, DIInjectable
{
    /** @var  Container */
    protected $di;

    public function setDI(Container $di)
    {
        $this->di = $di;
    }

    public function process(array $data)
    {
        /** @var MO $moService */
        $moService = $this->di->get(MO::class);

        $moRequest = new MORequest();
        $moRequest->fromArray($data);

        $moService->process($moRequest);
    }
}