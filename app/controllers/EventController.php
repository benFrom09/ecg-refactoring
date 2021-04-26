<?php
declare(strict_types=1);
namespace Ecogolf\controllers;

use DateTime;
use SimpleEvent\EventManager;
use Ecogolf\Core\BaseController;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class EventController extends BaseController
{

    public function index(ServerRequestInterface $request,ResponseInterface $response,$args){
        $menu_items = $this->container->get('site_content')['navbar'];
        $footer = $this->container->get('site_content')['footer'];
        
        $eventManager = new EventManager($this->pdo);
        $events = $eventManager->orderBy("start_time","ASC");
        $eventsByMonth = [];
        foreach($events as $event) {
            $date = (new DateTime($event->start_time))->format("F");
            if($date === (new DateTime($event->start_time))->format("F")){
                $eventsByMonth[$date][] = $event;
            }    
        }
        $this->renderer->render('pages.events',['menu_items'=> $menu_items,'footer'=>$footer,'events'=>$eventsByMonth,'date'=>$date]);
        return $response;
    }
    
}