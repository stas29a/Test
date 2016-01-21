<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 21.01.16
 * Time: 21:42
 */

namespace Application\Actions;

use Application\Interfaces\MOStatistics;
use Application\Interfaces\Response;

class Statistics extends AbstractAction
{
    public function run()
    {
        /** @var MOStatistics $moStatistics */
        $moStatistics = $this->di->get(MOStatistics::class);
        $result = [];

        $result['last_15_min_mo_count'] = $moStatistics->getLast15minMOCount();
        $result['time_span_last_10k'] = $moStatistics->getTimeSpanLast10k();

        /** @var \Application\Interfaces\Response $response */
        $response = $this->di->get(Response::class);
        $response->setData($result);

        $response->send();
    }
}