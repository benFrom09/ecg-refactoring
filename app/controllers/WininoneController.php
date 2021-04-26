<?php
namespace Ecogolf\controllers;


use Ecogolf\Core\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class WininoneController extends BaseController
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response,$args)
    {
        $menu_items = $this->getNavbar('site_content')['navbar'];
        
        $footer = $this->container->get('site_content')['footer'];
        $this->renderer->render('pages.wininone',['menu_items'=>$menu_items,'footer'=>$footer]);
        return $response;
    }
}