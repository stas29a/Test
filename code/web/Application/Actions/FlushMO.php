<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 21.01.16
 * Time: 22:56
 */

namespace Application\Actions;

use Application\Interfaces\MO;
use Application\Interfaces\Response;

class FlushMO extends AbstractAction
{
    public function run()
    {
        /** @var MO $moService */
        $moService = $this->di->get(MO::class);

        /** @var Response $response */
        $response = $this->di->get(Response::class);

        $moService->flushNotProcessed();

        $response->setData('flushed');
        $response->send();
    }
}