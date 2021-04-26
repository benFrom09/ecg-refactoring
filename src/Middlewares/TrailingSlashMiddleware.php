<?php
declare(strict_types=1);

namespace Ecogolf\Core\Middlewares;

use Slim\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TrailingSlashMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request,RequestHandlerInterface $handler):ResponseInterface {

        $uri = $request->getUri();
        $path = $uri->getPath();
        
        if ($path != '/' && substr($path, -1) == '/') {
            // permanently redirect paths with a trailing slash
            // to their non-trailing counterpart
            $uri = $uri->withPath(substr($path, 0, -1));
            
            if ($request->getMethod() == 'GET') {
                $response = new Response();
                return $response
                    ->withHeader('Location', (string) $uri)
                    ->withStatus(301);
            } else {
                $request = $request->withUri($uri);
            }
        }
    
        return $handler->handle($request);
    }
}