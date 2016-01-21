<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 23:34
 */

namespace Application\Actions;

use Application\Interfaces\DIInjectable;
use Application\Interfaces\IAction;
use DI\Container;

abstract class AbstractAction implements IAction, DIInjectable
{
    protected $request;

    /** @var  \DI\Container */
    protected $di;

    public function setRequest(array $request)
    {
        $this->request = $request;
    }

    public function setDI(Container $di)
    {
        $this->di = $di;
    }
}