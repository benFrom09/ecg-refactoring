<?php


namespace Ecogolf\models;

use Ben09\Database\Entities\Entity;

class Course extends Entity
{

    private $name;

    private $state;


    public function setName(string $name) {
        $this->name = $name;
    }

    public function setState(int $state) {
        $this->state = $state;
    }

    public function getName() {
        return $this->name;
    }

    public function getState() {
        return $this->state;
    }

}