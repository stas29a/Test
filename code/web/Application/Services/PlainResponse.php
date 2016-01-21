<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 21.01.16
 * Time: 22:39
 */

namespace Application\Services;


use Application\Interfaces\Response;

class PlainResponse implements Response
{
    protected $data;

    public function setData($data)
    {
        $this->data = $data;
    }

    public function send()
    {
        echo $this->data."\n";
    }
}