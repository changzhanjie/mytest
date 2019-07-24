<?php
/**
 * Created by changzhanjie123@163.com
 * User: czj
 * Date: 2019/7/23
 * Time: 2:11 PM
 */

namespace Simplex;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ContentLengthListener implements EventSubscriberInterface
{
    public function onResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();
        $headers = $response->headers;

        //if (!$headers->has('Content-Length') && !$headers->has('Transfer-Encoding')) {
            $headers->set('Server', strlen($response->getContent()));
//        }
    }

    public static function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
        return array('response' => array('onResponse',-255));
    }
}