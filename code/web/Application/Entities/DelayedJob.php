<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 18.01.16
 * Time: 22:49
 */

namespace Application\Entities;


class DelayedJob implements \JsonSerializable
{
    protected $handler;
    protected $data;

    /**
     * @return mixed
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @param mixed $handler
     */
    public function setHandler($handler)
    {
        $this->handler = $handler;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return ['handler' => $this->handler, 'data' => $this->data];
    }

    /**
     * @param array $array
     * @return DelayedJob
     */
    public static function fromArray(array $array)
    {
        $instance = new self;
        $instance->setHandler($array['handler']);
        $instance->setData($array['data']);

        return $instance;
    }
}