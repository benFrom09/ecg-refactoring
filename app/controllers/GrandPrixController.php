<?php
namespace Ecogolf\controllers;


use Ecogolf\Core\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GrandPrixController extends BaseController
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response,$args)
    {
        $menu_items = $this->getNavbar('site_content')['navbar'];
        $gprix_content = $this->container->get('site_content')['gprix'];
        $footer = $this->container->get('site_content')['footer'];
        $this->renderer->render('pages.gprix',['menu_items'=>$menu_items,'gprix_content'=>$gprix_content,'footer'=>$footer]);
        return $response;
    }
}