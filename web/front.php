<?php
/**
 * Created by changzhanjie123@163.com
 * User: czj
 * Date: 2019/7/22
 * Time: 4:17 PM
 */

include_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

ini_set('display_errors', 1);
error_reporting(-1);
$request  =  Request::createFromGlobals();
//$requestStack = new RequestStack();

$routes = include __DIR__.'/../src/app.php';
$sc = include __DIR__.'/../src/container.php';
//
//
//$dispatcher = new EventDispatcher();
//
//$dispatcher->addSubscriber(new HttpKernel\EventListener\RouterListener($matcher, $requestStack));
////$dispatcher->addSubscriber(new HttpKernel\EventListener\ResponseListener('UTF-8'));
//$dispatcher->addSubscriber(new Simplex\StringResponseListener());

$response = $sc->get('framework')->handle($request);

$response->send();

