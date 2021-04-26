<?php
declare(strict_types=1);
namespace Ecogolf\models;

use Ben09\Database\Entities\Entity;
use DateTime;

class Article extends Entity
{
    private $id;

    private $title;

    private $author;

    private $content;

    private $date;

    private $image = NULL;

    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function setAuthor(string $author) {
        $this->author = $author;
    }

    public function setContent(string $content) {
        $this->content = $content;
    }

    public function setDate(string $date ) {
        if(is_null($date) || $date == "") {
            $date = date("Y-m-d H:i:s");
        }
        $this->date = $date;
    }

    public function setId($id) {
        $this->id = (int) $id;
    }

    public function setImage($image) {
        $this->image = !is_null($image) ? (string) $image : NULL;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getContent() {
        return $this->content;
    }

    public function getDate() {
        return new DateTime($this->date);
    }

    public function getId() {
        return $this->id;
    }

    public function getImage() {
        return $this->image;
    }

    public function getSample(){
        return substr($this->getContent(),0,100);
    }
}