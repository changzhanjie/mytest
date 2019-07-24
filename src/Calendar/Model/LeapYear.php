<?php
/**
 * Created by changzhanjie123@163.com
 * User: czj
 * Date: 2019/7/23
 * Time: 10:10 AM
 */
namespace Calendar\Model;

class LeapYear
{
    function isLeapYear($year = null) {

        if (null === $year) {
            $year = date('Y');
        }
        return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
    }
}