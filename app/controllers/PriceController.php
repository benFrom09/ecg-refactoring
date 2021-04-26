<?php
namespace Ecogolf\controllers;

use DateTime;
use Ecogolf\Core\BaseController;
use Ecogolf\models\PriceManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use ReflectionClass;

class PriceController extends BaseController
{
    public function index(ServerRequestInterface $request,ResponseInterface $response,$args) {
        $menu_items = $this->getNavbar('site_content')['navbar'];
        $footer = $this->container->get('site_content')['footer'];
        $priceManager = new PriceManager;
        $green_prices = $priceManager->getGreenFeePrices();
        $subscriptions = $priceManager->getSubscriptionsPrices();
        $services = $priceManager->getServicesPrices();
        $bapteme = $priceManager->getBapteme();
        $advantage = $priceManager->getAdvantage();
        $numberOfOffersDisplayed = $priceManager->getNumberOfDisplayedOffers();
        $offers = $priceManager->getSpecialOffers();
        $todayDate = (new DateTime())->format('d/m/Y');
        $this->renderer->render('pages.prices',["menu_items"=>$menu_items,"footer"=>$footer,"date"=>$todayDate,
        "green_prices"=>$green_prices,"subscriptions"=>$subscriptions,"services"=>$services,
        "bapteme"=>$bapteme,"advantage"=>$advantage,"_offers"=>$offers,
        "numberOfSpecialOffers"=> $numberOfOffersDisplayed->number_displayed_offers ]);
        return $response;
    }

    

}