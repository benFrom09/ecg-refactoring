<?php
namespace Ecogolf\controllers;

use Ecogolf\Core\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AboutController extends BaseController
{
    public function __invoke(ServerRequestInterface $request,ResponseInterface $response,$args)
    {
        $menu_items = $this->getNavbar('site_content')['navbar'];
        $about = $this->container->get('site_content')['about'];
        $footer = $this->container->get('site_content')['footer'];
        $this->renderer->render('pages.about',["menu_items" =>$menu_items,"about"=>$about,"footer"=>$footer]);
        return $response;
    }
}