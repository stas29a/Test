<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 18.01.16
 * Time: 23:52
 */

namespace Application\Entities;


use Application\Interfaces\Entity;

class MO extends MORequest implements Entity
{
    protected $authToken;
    protected $createdAt;

    public function getNamespace()
    {
        return "mo";
    }

    public function fromArray(array $data)
    {
        $this->authToken = $data['auth_token'];
        $this->createdAt = $data['created_at'];
        $this->msisdn = $data['msisdn'];
        $this->operatorId = $data['operatorid'];
        $this->text = $data['text'];
    }

    public function toArray()
    {
        return $this->jsonSerialize();
    }

    function jsonSerialize()
    {
        $r = parent::jsonSerialize();
        $r['auth_token'] = $this->authToken;
        $r['created_at'] = $this->createdAt;

        return $r;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * @param mixed $authToken
     */
    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;
    }
}