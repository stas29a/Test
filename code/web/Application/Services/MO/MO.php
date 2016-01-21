<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 22:23
 */

namespace Application\Services\MO;

use Application\Entities\DelayedJob;
use Application\Entities\MORequest;
use DI\Container;
use Application\Jobs\MOProcessing;
use Application\Interfaces\DelayedJobs;
use Application\Interfaces\Storage;

class MO implements \Application\Interfaces\MO
{
    protected $di;

    public function __construct(Container $di)
    {
        $this->di = $di;
    }

    public function getNotProcessedCount()
    {
        /** @var DelayedJobs $delayedJobs */
        $delayedJobs = $this->di->get(DelayedJobs::class);
        return $delayedJobs->getQueueSize();
    }

    public function flushNotProcessed()
    {
        /** @var DelayedJobs $delayedJobs */
        $delayedJobs = $this->di->get(DelayedJobs::class);
        $delayedJobs->flushQueue();
    }


    /**
     * This method is just send job to daemon
     * @param MORequest $MORequest
     */
    public function handle(MORequest $MORequest)
    {
        $delayedJob = new DelayedJob();
        $delayedJob->setHandler(MOProcessing::class);
        $delayedJob->setData($MORequest);

        /** @var DelayedJobs $delayedJobs */
        $delayedJobs = $this->di->get(DelayedJobs::class);

        $delayedJobs->publish($delayedJob);
    }

    /**
     * @param MORequest $MORequest
     * @throws \DI\NotFoundException
     */
    public function process(MORequest $MORequest)
    {
        $strParams = json_encode($MORequest);
        $registermoCommand = $this->di->get('registermo');
        $tmp = [];

        exec($registermoCommand." ".$strParams, $tmp);
        $token = $tmp[0];

        /** @var Storage $storageService */
        $storageService = $this->di->get(Storage::class);

        $moEntity = new \Application\Entities\MO();

        $moEntity->setMsisdn($MORequest->getMsisdn());
        $moEntity->setText($MORequest->getText());
        $moEntity->setOperatorId($MORequest->getOperatorId());
        $moEntity->setShortcodeId($MORequest->getShortcodeId());
        $moEntity->setAuthToken($token);
        $moEntity->setCreatedAt(date('Y-m-d H:i:s'));

        $storageService->save($moEntity);
    }
}