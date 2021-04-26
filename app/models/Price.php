<?php
namespace Ecogolf\models;


class Price
{
    public $id;

    public $price;

    public $comments;

    public function __construct($id,$price,$comments = null,$offer_description = null){
        $this->setId($id);
        $this->setPrice($price);
        $this->setComments($comments);
        $this->setOfferDescription($offer_description);
    }

    public function setOfferDescription($offer_description){
        $this->offer_description = $offer_description;
    }

    public function getOfferDescription() {
        return $this->offer_description;
    }

    public function setId($id){
        $this->id = (int) $id;
    }

    public function setPrice($price){
        $this->price = (float) $price;
    }

    public function setComments(?string $comments){
        $this->comments = $comments;
    }

    public function getPrice():float{
        return $this->price;
    }

    public function getId():int {
        return $this->id;
    }

    public function getComments():?string {
        return $this->comments;
    }
}