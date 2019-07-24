<?php
/**
 * Created by changzhanjie123@163.com
 * User: czj
 * Date: 2019/7/23
 * Time: 10:09 AM
 */
namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Calendar\Model\LeapYear;

class LeapYearController
{
    public function indexAction($year)
    {
        $leapYear= new LeapYear();

        if ($leapYear->isLeapYear($year)) {

            $response= 'Yep, this is a leap year!'.rand();
        }else{
            $response = 'Nope, this is not a leap year.';

        }


        return $response;
    }
}