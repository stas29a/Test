<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 23:53
 */

namespace Application\Services;


class JSONResponse implements \Application\Interfaces\Response
{
    protected $data;

    public function setData($data)
    {
        $this->data = $data;
    }

    public function send()
    {
        echo json_encode($this->data);
    }
}