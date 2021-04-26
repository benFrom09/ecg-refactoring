<?php
declare(strict_types=1);
namespace Ecogolf\controllers\admin;

use DateTime;
use Ecogolf\models\Price;
use Ecogolf\models\Course;
use Ecogolf\Core\AuthController;
use Ecogolf\models\PriceManager;
use Ecogolf\models\CourseManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AdminController extends AuthController
{
    
    public function index(ServerRequestInterface $request,ResponseInterface $response,$args) {
        $auth = $this->auth->user();
        $date = (new DateTime())->format('d-m-Y');
        $courses = (new CourseManager())->fetchAll();
        $priceManager = new PriceManager;
        $green_prices = $priceManager->getGreenFeePrices();
        $subscriptions = $priceManager->getSubscriptionsPrices();
        $services = $priceManager->getServicesPrices();
        $bapteme = $priceManager->getBapteme();
        $bapteme_promo = $priceManager->getBaptemePromo();
        $advantage = $priceManager->getAdvantage();
        $offers = $priceManager->getSpecialOffers();
        $this->renderer->render('admin.pages.index',["auth"=>$auth,"date"=>$date,"courses" =>$courses,
        "_green_prices"=>$green_prices,"subscriptions"=>$subscriptions,
        "services"=>$services,"bapteme"=>$bapteme,
        "bapteme_promo"=>$bapteme_promo,"advantage"=>$advantage,"offers"=>$offers]);
        return $response;
    }

    public function editCourses(ServerRequestInterface $request,ResponseInterface $response,$args) {
        if($request->getParsedBody()) {
            $data = $request->getParsedBody();
            
            foreach($data as $key => $value) {
                $data_to_inject = [
                    "name" => $key,
                    "state" => intval($value)
                ];
                $course = (new CourseManager())->hydrate(New Course(),$data_to_inject)->updateStateFromEtity();
            }
            if($course) {
                return $response->withHeader('location', '/admin/index');
            }
            //return errors;
        }
        
        return $response;
    }

    public function editPrices(ServerRequestInterface $request,ResponseInterface $response,$args):ResponseInterface{
        if($request->getParsedBody()){
            $data = $request->getParsedBody();
            $priceManager = new PriceManager();
            //hydrate
            foreach($data as $key => $value){
                    $comment = isset($value[1])? $value[1] : NULL;
                    $_price = isset($value[0]) && $value[0] !== "" ?  trim($value[0]) : 0;
                    //validate
                    $price = new Price(intval($key),floatval($_price),$comment);
                    $req = $priceManager->updatePrice($price);   
            }   
        }
        return $response->withHeader('location','/admin/index');
    }

    public function editBapteme(ServerRequestInterface $request,ResponseInterface $response,$args):ResponseInterface{
        if($request->getParsedBody()){
            $data = $request->getParsedBody();
            $priceManager = new PriceManager();
            //hydrate
            foreach($data as $key => $value){
                if($key !=="promo") {
                    $_price = floatval($value);
                 //validate
                    $price = new Price(intval($key),$_price,NULL);
                 
                    $req = $priceManager->updatePrice($price);
                } else {
                    $req = $priceManager->updateBatemePromo($value);
                } 
            }   
        }
        return $response->withHeader('location','/admin/index');
    }

    public function editAdvantage(ServerRequestInterface $request,ResponseInterface $response,$args):ResponseInterface{
        if($request->getParsedBody()){
            $data = $request->getParsedBody();
            $manager = new PriceManager();
            $req = $manager->updateAdvantages($data["advantage"]); 
        }
        return $response->withHeader('location','/admin/index');
    }

    public function editSpecialOffer(ServerRequestInterface $request,ResponseInterface $response,$args):ResponseInterface{
        if($request->getParsedBody()){
            $data = $request->getParsedBody();
            $manager = new PriceManager();         
            foreach($data as $key => $array){
               $content = isset($array['content']) ? $array['content'] : NULL;
               $colorized = isset($array['colorized']) ? intval($array['colorized']) : 0 ;
               $bold = isset($array['bold']) ? intval($array['bold']) : 0 ;
               $displayed = isset($array['displayed']) ? intval($array['displayed']) : 0 ;
                $req = $manager->updateSpecialOffers($content,$colorized,$bold,$displayed,intval($key));
            }
            
        }
        return $response->withHeader('location','/admin/index');
    }


}