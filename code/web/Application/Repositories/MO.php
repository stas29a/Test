<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 21.01.16
 * Time: 21:23
 */

namespace Application\Repositories;


use Application\Interfaces\DIInjectable;
use DI\Container;

class MO implements DIInjectable
{
    /** @var  Container */
    protected $di;

    /**
     * @param Container $di
     */
    public function setDi(Container $di)
    {
        $this->di = $di;
    }

    public function getLast15minMOCount()
    {
        $pdo = $this->di->get(\PDO::class);
        $stmt = $pdo->prepare("SELECT count(id) as c from mo where created_at > :date");
        $t15mAgo = new \DateTime("15 minutes ago");
        $stmt->execute(['date' => $t15mAgo->format("Y-m-d H:i:s")]);
        return $stmt->fetch()['c'];
    }

    public function getTimeSpanLast10k()
    {
        $pdo = $this->di->get(\PDO::class);
        $stmt = $pdo->prepare("SELECT min(m.created_at), max(m.created_at) from (SELECT created_at from mo order by created_at DESC limit 10000) as m");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}