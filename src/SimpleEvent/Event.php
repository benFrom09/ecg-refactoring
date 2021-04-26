<?php
namespace SimpleEvent;

use DateTime;
use SimpleEvent\EventInterface;

class Event implements EventInterface
{
    private $id;
    private $name;
    private $description;
    private $start_time;
    private $end_time;
    private $logo;
    
    
    public function getId():int {
        return $this->id;
    }
    public function getName():string {
        return $this->name;
    }
    public function getDescription():string {
        return $this->description ?? '';
    }
    public function getStartTime():DateTime {
        return new DateTime($this->start_time);
    }
    public function getEndTime():DateTime {
        return new DateTime($this->end_time);
    }

    public function getLogo() {
        return $this->logo;
    }
    public function setName(string $name) {
        $this->name = $name;
    }
    public function setDescription(string $description) {
        $this->description = $description;
    }
    public function setStartTime(string $start) {
        $this->start_time = $start;
    }
    public function setEndTime(string $end) {
        $this->end_time = $end;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function setLogo(int $logo) {
        $this->logo = $logo;
    }
}