<?php
namespace App\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ApiListener
{
    public function onKernelResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();
        $response->headers->set("Access-Control-Allow-Origin", $_ENV['ALLOW_ORIGIN']);
        $response->headers->set("Access-Control-Allow-Headers", $_ENV['ALLOW_ORIGIN']);
    }


}
