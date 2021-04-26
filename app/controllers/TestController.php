<?php
namespace Ecogolf\controllers;

use Ecogolf\Core\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class TestController extends BaseController
{
    /*
    public function __invoke(ServerRequestInterface $request,ResponseInterface $response,$args)
    {
       echo "test";
        return $response;
    }
    */

    public function index(ServerRequestInterface $request,ResponseInterface $response,$args) {
        echo "test";
        return $response;
    }
}