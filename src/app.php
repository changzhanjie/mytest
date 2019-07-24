<?php
/**
 * Created by changzhanjie123@163.com
 * User: czj
 * Date: 2019/7/22
 * Time: 4:45 PM
 */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
//$routes->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World')));
$routes->add('bye', new Routing\Route('/bye'));
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => "Calendar\\Controller\\LeapYearController::indexAction"
)));


return $routes;