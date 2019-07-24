<?php
/**
 * Created by changzhanjie123@163.com
 * User: czj
 * Date: 2019/7/23
 * Time: 1:34 PM
 */

namespace Simplex;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\EventDispatcher\Event;

class ResponseEvent extends Event
{
    private $request;
    private $response;

    public function __construct($response, Request $request)
    {
        $this->response = $response;
        $this->request = $request;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getRequest()
    {
        return $this->request;
    }
}