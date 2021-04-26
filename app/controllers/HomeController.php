<?php
declare(strict_types=1);

namespace Ecogolf\controllers;

use Ecogolf\Core\BaseController;
use Ecogolf\Core\Cookie;
use Ecogolf\Core\MeteoIo;
use Ecogolf\models\PriceManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\Psr17\Psr17FactoryProvider;

class HomeController extends BaseController
{
    public function __invoke(ServerRequestInterface $request,ResponseInterface $response,$args) {
        //restreint les appels api meto 

        $weather = $this->getRestrictedMeteo(3600);
        $menu_items = $this->getNavbar('site_content')['navbar'];

        $homePage = $this->container->get('site_content')['homepage'];

        $footer = $this->container->get('site_content')['footer'];

        $query = $this->pdo->query("SELECT * FROM courses");
        $data = $query->fetchAll();
        $prices = $this->getSamplePrices();
        $state = [];
        foreach($data as $obj) {
            $state[] = $obj->state;
        }
        $logos = $this->getLogos();
        $this->renderer->render('pages.home',["menu_items" => $menu_items,"footer"=>$footer,"home_page" =>$homePage,
        "state"=>$state,"meteo" =>$weather,"logos"=>$logos,"prices"=>$prices]);
        return $response;
    }

    /**
     * retricted call to the méteo API stay below 1000calls/day to get free access 
     *
     * @param integer $time
     * @return void
     */
    private function getRestrictedMeteo(int $time = 1800):array{
        if(!array_key_exists("meteo",$_COOKIE)) {
            $meteo = new MeteoIo(43.0236372,1.4659194,null,METEO_API_KEY);
            Cookie::setCookie("meteo",$meteo->getCurrentWeather(),time() + $time , '/','',false);
            $weather = $meteo->getCurrentWeather();
        } else {
            $weather = Cookie::getCookie("meteo");
        }
        return $weather;
    }

    private function getSamplePrices():array{
        $manager = new PriceManager();
        $gf =  $manager->getGreenFeePrices();
        $ba = $manager->getBapteme();
        $gf18 = $this->getMin($gf["Green Fee 18 Trous"]);
        $gf18j = $this->getMin($gf["Junior (-18 ans)"]);
        $gf9a = $this->getMax($gf["Compact Pitch & Putt Adulte"]);
        $gf9j = $this->getMin($gf["Compact Pitch & Putt Adulte"]);
        $prices = [$gf18->price,$gf18j->price,$gf9a->price,$gf9j->price,$ba[1]->price,$ba[0]->price];
        return $prices;
    }

    private function getMin($a) {
        return min($a);
    }

    private function getMax($a) {
        return max($a);
    }

    public function getLogos() {
       $folder =  scandir(STORAGE . "/p_logo");
       $files = [];
       foreach($folder as $file) {
           if(preg_match('/^l[0-9]+(.png|.jpg)$/',$file,$matches)){
               $files[] = $file;
           }
       }
       return $files;
       
    }

    
}