<?php
namespace Ecogolf\Core\Middlewares;

use ArrayAccess;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TypeError;

class CSRFMiddleware implements MiddlewareInterface
{
    private $key;

    private $sessionKey;

    private $session;

    private $limit;

    public function __construct(&$session,int $limit = 50,string $key = "_csrf",string $sessionKey = "csrf") {
        $this->sessionIsArrayAccess($session);
        $this->session = &$session;
        $this->key = $key;
        $this->sessionKey = $sessionKey;
        $this->limit = $limit;
    }

    public function process(ServerRequestInterface $request,RequestHandlerInterface $handler):ResponseInterface {
        if(in_array($request->getMethod(),['POST','PUT','DELETE'])) {
            $params = $request->getParsedBody() ?: [];
            if(!array_key_exists("_csrf",$params)){
                throw new Exception("CSRF TOKEN ERROR");
            } else {
                $tokenList = $this->session[$this->sessionKey] ?? [];
                if(in_array($params[$this->key],$tokenList,true)){
                    $this->useToken($params[$this->key]);
                    return $handler->handle($request);
                } else {
                    throw new Exception("CSRF TOKEN ERROR");
                }
            }
        } else {
            return $handler->handle($request);
        }
        
    }

    public function generateToken():string {
       $token = bin2hex(random_bytes(16));
       $tokenList = $this->session[$this->sessionKey] ?? [];
       $tokenList[] = $token;
       $this->session[$this->sessionKey]= $tokenList;
       $this->limitToken();
       return $token;
    }

    private function  useToken($key):void {
        $tokens = array_filter($this->session[$this->sessionKey],function($t) use($key){
            return $key !== $t;
        });
        $this->session[$this->sessionKey] = $tokens;
    }

    private function limitToken() {
        $tokens = $this->session[$this->sessionKey] ?? [];
        if(count($tokens) > $this->limit){
            array_shift($tokens);
        }
        $this->session[$this->sessionKey] = $tokens;
    }

    public function sessionIsArrayAccess($session) {
        if(!is_array($session) && !$session instanceof \ArrayAccess) {
            throw new TypeError("La session passée au CsrfMiddleware n'implemente pas ArrayAccessInterface");
        }
    }

    public function getKey():string{
        return $this->key;
    }
}