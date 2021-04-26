<?php
declare(strict_types=1);
namespace Ecogolf\controllers\admin;

use DateTime;
use PDO;
use SimpleEvent\Event;
use SimpleEvent\EventManager;
use SimpleEvent\Calendar;
use Ecogolf\Core\AuthController;
use Exception;
use SimpleEvent\EventPostValidator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class EventController extends AuthController
{

    public function index(ServerRequestInterface $request,ResponseInterface $response,$args){
        $session_messages = $this->checkForSessionMessage();
        $month = isset($args['month']) ? intval($args["month"]) : null;
        $year = isset($args['year']) ? intval($args["year"]) : null;
        $calendar = new Calendar($this->pdo,$month,$year);
        $previous = $calendar->previous();
        $next = $calendar->next();
        $this->renderer->render('admin.pages.admin_events',['calendar'=>$calendar,'previous'=>$previous,'next'=>$next,"messages"=>$session_messages]);
        return $response;
    }
    
    public function editEvent(ServerRequestInterface $request,ResponseInterface $response,$args) {
        $eventManager = new EventManager($this->pdo);     
        $event = $eventManager->get(intval($args["id"]));
        if(!is_null($event)) {
            $title = "Editer l'évènement " . $event->getName();
            $this->renderer->render("admin.pages.admin_edit_event",["data"=>
                                [
                                "id"=>$event->getId(),
                                "name"=>$event->getName(),
                                "description"=>$event->getDescription(),
                                "date"=>$event->getStartTime()->format('Y-m-d'),
                                "start_time"=>$event->getStartTime()->format('H:i'),
                                "end_time"=>$event->getEndTime()->format('H:i'),
                                "logo"=>$event->getLogo()
                                ],
                                "title"=>$title]);
            return $response;
        }
        $message = "L'évènement demandé n'existe pas :(";
        $this->renderer->render("errors.404",["message" => $message]);
        return $response->withStatus(404);
    }

    public function updateEvent(ServerRequestInterface $request,ResponseInterface $response,$args) {
        $data = !empty($request->getParsedBody()) ? $request->getParsedBody() : null;
        if($data) {
            $date = (new DateTime($data["date"]))->format('m/Y');
            $validator= new EventPostValidator();
            $errors = $validator->validate($data);
            if (empty($errors)) {
                $eventManager = new EventManager($this->pdo);
                $event = $eventManager->hydrate(new Event(), $data);
                $res = $eventManager->update($event);
                if($res) {
                    return $response->withHeader('location', '/admin/events/' . $date);
                }
                
            }
        }
        return $response;
    }

    public function deleteEvent(ServerRequestInterface $request,ResponseInterface $response,$args) {
        $event = new EventManager($this->pdo);
        $evt = $event->get(intval($args["id"]));
        $date = $evt->getStartTime();
        $name = $evt->getName();    
        $query = $event->delete(intval($args["id"]));
        if($query) {
            $message = "L'évènement " . $name . " du ". $date->format('m/Y') . " à bien été éffacé!";
            $this->session->set("message", ["success" => $message]);
            return $response->withAddedHeader('location','/admin/events/' .substr($date->format('m/Y'),1));
        }
        $message = "Une erreur est survenue, contactez le webmaster!";
        $this->session->set("message", ["danger" => $message]);
        return $response->withAddedHeader('location','/admin/events/');
    }

    public function addEvent(ServerRequestInterface $request,ResponseInterface $response,$args) {
        $date = isset($args["date"]) ? $args["date"]:"";
        $data = $request->getParsedBody();
        if(!is_null($request->getParsedBody()) && !empty($request->getParsedBody())) {
            $validator= new EventPostValidator();
            $errors = $validator->validate($data);
            if(empty($errors)){
                $eventManager = new EventManager($this->pdo);
                $event = $eventManager->hydrate(new Event(),$data);
                $eventManager->create($event);
                return $response->withHeader('location','/admin/events/' . (new DateTime($date))->format("m/Y"));
            }
            $this->renderer->render('admin.pages.admin_add_event',["errors" =>$errors]);
            return $response;
        }
        
        $this->renderer->render('admin.pages.admin_add_event',["date" =>$date]);
        return $response;
    }


}