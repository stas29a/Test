<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 23:33
 */

namespace Application\Actions;

use Application\Entities\MORequest;
use Application\Interfaces\MO;
use Application\Interfaces\Response;

class ProcessMO extends AbstractAction
{
    public function run()
    {
        /** @var \Application\Interfaces\MO $moService */
        $moService =  $this->di->get(MO::class);
        $moRequest = new MORequest();
        $moRequest->setMsisdn($this->request['msisdn']);
        $moRequest->setOperatorId($this->request['operatorid']);
        $moRequest->setText($this->request['text']);
        $moRequest->setShortcodeId($this->request['shortcodeid']);

        $result = $moService->handle($moRequest);

        /** @var \Application\Interfaces\Response $response */
        $response = $this->di->get(Response::class);
        $response->setData(['status' => 'ok']);

        return $response->send();
    }
}