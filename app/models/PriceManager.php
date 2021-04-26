<?php
namespace Ecogolf\models;

use Ben09\Database\DBManager;

class PriceManager extends DBManager
{
    protected $table = "prices";

    protected $primary_key = "id";


    public function getPrices(){
        return  $this->query(
            "SELECT prices.price , course_offers.name AS course_name ,prices_variables.name AS variable_name,prices_variables.comments AS variable_description 
            FROM prices INNER JOIN course_offers ON course_offers.id = prices.course_offer_id
            INNER JOIN prices_variables ON price_variable_id = prices_variables.id"
            )->fetchAll();
    }
    public function getBapteme(){
        return $this->query(
            "SELECT prices.price,prices.id, course_offers.name AS course_name,course_offers.promo AS promo, prices_variables.name AS variable_name FROM prices
            INNER JOIN course_offers ON course_offers.id = prices.course_offer_id INNER JOIN prices_variables ON price_variable_id = prices_variables.id WHERE course_offers.name LIKE '%Baptème%'"
        )->fetchAll();
    }
    public function getBaptemePromo() {
        $sql = "SELECT course_offers.promo FROM course_offers WHERE course_offers.name = 'Baptême' LIMIT 1";
        return $this->query($sql)->fetch();

    }
    /**
     * get fallowing data structure: (
     * [0]=>["season1,season2..],
     * ["course_name1"]=>["price1],
     * ["course_name2]=>[price2]...
     * )
     *
     * @return array
     */
    public function getGreenFeePrices() {
        $courses = [];
        $seasons = [];
        //WHERE course_offers.name LIKE '%Green Fee%'
        $data = $this->query(
            "SELECT prices.price,prices.id , course_offers.name AS course_name ,prices_variables.name AS variable_name,prices_variables.comments AS variable_description 
            FROM prices INNER JOIN course_offers ON course_offers.id = prices.course_offer_id 
            INNER JOIN prices_variables ON price_variable_id = prices_variables.id"
            )->fetchAll();
            foreach($data as $key => $value) {
                if($value->course_name !="Baptême" && $value->variable_name != "-18 ans") {
                    if(!array_key_exists($value->course_name,$courses)){
                        $courses[$value->course_name][] = new Price($value->id,$value->price); //$value->price;
                    } else {
                         $courses[$value->course_name][] = new Price($value->id,$value->price);//$value->price;
                    }
                    if(!in_array($value->variable_name,$seasons)) {
                        $seasons[] = $value->variable_name;
                    }
                } 
            }
            $courses = array_merge([$seasons],$courses);
            return $courses;
    }

    public function getSubscriptionsPrices() {
        $subscriptions = [];
        $seasons = [];
        //WHERE course_offers.name LIKE '%Green Fee%'
        $data = $this->query(
            "SELECT prices.price,prices.id ,prices.comments, subscriptions.name
                AS subscription ,subscriptions.comments AS offer_description,prices_variables.name
                AS variable_name,prices_variables.comments
                AS variable_description 
                FROM prices INNER JOIN subscriptions ON subscriptions.id = prices.subscriptions_id
                LEFT JOIN prices_variables ON price_variable_id = prices_variables.id OR NULL "
            )->fetchAll();
            foreach($data as $key => $value) {
               if(!array_key_exists($value->subscription,$subscriptions)){
                   $subscriptions[$value->subscription][] = new Price($value->id,$value->price,$value->comments,$value->offer_description);
               } else {
                    $subscriptions[$value->subscription][] = new Price($value->id,$value->price,$value->comments,$value->offer_description);
               }
               if(!in_array($value->variable_name,$seasons)) {
                   $seasons[] = $value->variable_name;
               }
               
            }
            $subscriptions = array_merge([$seasons],$subscriptions);
            return $subscriptions;
      
    }

    public function getServicesPrices() {
        $services = [];
        $seasons = [];
        //WHERE course_offers.name LIKE '%Green Fee%'
        $data = $this->query(
            "SELECT prices.price,prices.id ,prices.comments, services.name
                AS service ,prices_variables.name
                AS variable_name,prices_variables.comments
                AS variable_description 
                FROM prices INNER JOIN services ON services.id = prices.service_id
                LEFT JOIN prices_variables ON price_variable_id = prices_variables.id OR NULL "
        )->fetchAll();
        foreach($data as $key => $value) {
            if(!array_key_exists($value->service,$services)){
                $subscriptions[$value->service][] = new Price($value->id,$value->price,$value->comments);
            } else {
                $services[$value->service][] = new Price($value->id,$value->price,$value->comments);
            }
            if(!in_array($value->variable_name,$seasons)) {
                $seasons[] = $value->variable_name;
            }
               
        }
        $subscriptions = array_merge([$seasons],$subscriptions);
        return $subscriptions;
    }

    public function getAdvantage(){
        return $this->query("SELECT advantages.title AS title,advantages.content AS content FROM advantages LIMIT 1")->fetch();
    }

    public function getSpecialOffers(){
        return $this->query("SELECT * FROM special_offers")->fetchAll();
    }

    public function updateSpecialOffers($content,int $colorized,int $bold,int $displayed,int $id){
        $req = $this->prepare("UPDATE special_offers SET content = ?, colorized = ?, bold = ? , displayed = ? WHERE id = ? ");
        $req->execute([
            $content,$colorized,$bold,$displayed,$id
        ]);
        return $req;
    }

    public function getNumberOfDisplayedOffers() {
        return $this->query("SELECT SUM(displayed) AS number_displayed_offers FROM special_offers")->fetch();
    }

    public function updatePrice(Price $price) {
        $sql = "UPDATE {$this->table} SET price = ?, comments = ? WHERE {$this->primary_key} = ? ";
        $req = $this->prepare($sql);
        $req->execute([$price->getPrice(),$price->getComments(),$price->getId()]);
        return $req;
    }

    public function updateBatemePromo($promo) {
        $sql = "UPDATE course_offers SET promo = ? WHERE course_offers.name = ? ";
        $req = $this->prepare($sql);
        $req->execute([$promo,"Baptême"]);
        return $req;
    }

    public function updateAdvantages($adv) {
        $sql = "UPDATE advantages SET content = ? WHERE advantages.id = ? ";
        $req = $this->prepare($sql);
        $req->execute([$adv,1]);
        return $req;
    }
}