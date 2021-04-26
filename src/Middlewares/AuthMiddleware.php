<?php
declare(strict_types=1);

namespace Ecogolf\Core\Middlewares;

use Slim\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request,RequestHandlerInterface $handler):ResponseInterface {
        if (!array_key_exists("auth",$_SESSION)) {
            return (new Response())->withHeader('location','/');
        } 
        return $handler->handle($request);
    }
}