<?php
declare(strict_types=1);
namespace Ecogolf\controllers;

use Ecogolf\Core\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ContactController extends BaseController
{
    public function __invoke(ServerRequestInterface $request,ResponseInterface $response,$args){
        $menu_items = $this->container->get('site_content')['navbar'];
        $footer = $this->container->get('site_content')['footer'];
        $this->renderer->render("pages.contact",["menu_items"=>$menu_items,"footer"=>$footer]);
        return $response;
    }
  
}