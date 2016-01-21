<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 22:55
 */

namespace Application\Entities;


class MORequest implements \JsonSerializable
{
    protected $msisdn;
    protected $operatorId;
    protected $text;
    protected $shortcodeId;

    function jsonSerialize()
    {
        return [
            'msisdn' => $this->msisdn,
            'operatorid' => $this->operatorId,
            'text' => $this->text,
            'shortcodeid' => $this->shortcodeId
        ];
    }

    /**
     * @param array $data
     * @return $this
     */
    public function fromArray(array $data)
    {
        $this->setMsisdn($data['msisdn']);
        $this->setOperatorId($data['operatorid']);
        $this->setText($data['text']);
        $this->setShortcodeid($data['shortcodeid']);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getShortcodeId()
    {
        return $this->shortcodeId;
    }

    /**
     * @param mixed $shortcodeId
     */
    public function setShortcodeId($shortcodeId)
    {
        $this->shortcodeId = $shortcodeId;
    }

    /**
     * @return mixed
     */
    public function getMsisdn()
    {
        return $this->msisdn;
    }

    /**
     * @param mixed $msisdn
     */
    public function setMsisdn($msisdn)
    {
        $this->msisdn = $msisdn;
    }

    /**
     * @return mixed
     */
    public function getOperatorId()
    {
        return $this->operatorId;
    }

    /**
     * @param mixed $operatorId
     */
    public function setOperatorId($operatorId)
    {
        $this->operatorId = $operatorId;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}