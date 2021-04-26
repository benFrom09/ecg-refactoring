<?php

namespace Ecogolf\models;

use Ben09\Database\Entities\Entity;

class Gprix extends Entity
{
    public $id;

    public $content;

    public $title;

    public $nb_max_player;

    public $date;


    public function setId($id)
    {
        $this->id = (int) $id;
    }



    public function setContent(?string $content)
    {
        $this->content = $content;
    }

    public function setTitle(?string $title)
    {
        $this->title = $title;
    }

    public function setNbMaxPlayer(?string $nb_max_player)
    {
        $this->nb_max_player = $nb_max_player;
    }

    public function setDate(?string $date) {
        $this->date = $date;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDate() {
        return $this->date;
    }

    public function getNbMaxPlayer() {
        return $this->nb_max_player;
    }

    public function getAll()
    {
        return $this;
    }
}
