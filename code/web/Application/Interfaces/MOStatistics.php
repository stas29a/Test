<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 17.01.16
 * Time: 23:16
 */

namespace Application\Interfaces;


interface MOStatistics
{
    public function getLast15minMOCount();
    public function getTimeSpanLast10k();
}