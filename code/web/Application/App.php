<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 22:15
 */

namespace Application;

use Application\Interfaces\DIInjectable;
use DI\Container;

class App implements DIInjectable
{
    protected $request;
    protected $di;

    /** @var  \Application\Interfaces\IAction */
    protected $action;

    public function run()
    {
        $this->action->setRequest($this->request);
        $this->action->run();
    }

    /**
     * @return Interfaces\IAction
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param Interfaces\IAction $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return Container
     */
    public function getDi()
    {
        return $this->di;
    }

    /**
     * @param Container $di
     */
    public function setDi(Container $di)
    {
        $this->di = $di;
    }
}