<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 23:13
 */

namespace Application\Services\MO;


use Application\Interfaces\MOStatistics;
use Application\Interfaces\Storage;

class Statistics implements MOStatistics
{
    protected $storage;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    public function getLast15minMOCount()
    {
        /** @var \Application\Repositories\MO $repository */
        $repository = $this->storage->getRepository('Application\\Entities\\MO');
        return $repository->getLast15minMOCount();
    }

    public function getTimeSpanLast10k()
    {
        /** @var \Application\Repositories\MO $repository */
        $repository = $this->storage->getRepository('Application\\Entities\\MO');
        return $repository->getTimeSpanLast10k();
    }
}