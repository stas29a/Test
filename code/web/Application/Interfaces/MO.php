<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 22:52
 */

namespace Application\Interfaces;


use Application\Entities\MORequest;

interface MO
{
    public function handle(MORequest $MORequest);
    public function process(MORequest $MORequest);
}