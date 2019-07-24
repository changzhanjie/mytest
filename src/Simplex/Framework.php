<?php
/**
 * Created by changzhanjie123@163.com
 * User: czj
 * Date: 2019/7/23
 * Time: 9:57 AM
 */
namespace Simplex;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcherInterface;

class Framework extends HttpKernel
{
    protected $dispatcher;
    protected $matcher;
    protected $controllerResolver;
    protected $argumentResolver;

    public function __construct(EventDispatcher $dispatcher,UrlMatcherInterface $matcher,ControllerResolver $controllerResolver,ArgumentResolver $argumentResolver)
    {
        $this->dispatcher = $dispatcher;
        $this->matcher = $matcher;
        $this->controllerResolver = $controllerResolver;
        $this->argumentResolver = $argumentResolver;

    }

    public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true){

        $this->matcher->getContext()->fromRequest($request);

        try {
            $request->attributes->add($this->matcher->match($request->getPathInfo()));

            $controller = $this->controllerResolver->getController($request);
            $arguments = $this->argumentResolver->getArguments($request, $controller);

            $response = call_user_func_array($controller, $arguments);

        } catch (ResourceNotFoundException $e) {

            $response = new Response('Not Found', 404);

        } catch (Exception $e) {
            $response = new Response('An error occurred', 500);
        }
        $event=new GetResponseForControllerResultEvent($this,$request,$type,$response);
        $this->dispatcher->dispatch($event,'kernel.view');
        if ($event->hasResponse()) {
            $response = $event->getResponse();
        }
        $this->dispatcher->dispatch(new ResponseEvent($response,$request),'response');

        return $response;
    }


}