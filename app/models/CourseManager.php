<?php
namespace Ecogolf\models;

use Ben09\Database\DBManager;

class CourseManager extends DBManager
{
    protected $table = "courses";

    protected $primary_key = "id";

    public function updateStateFromEtity() {
        if(!is_null($this->entity)) {
            $sql = "UPDATE {$this->table} SET state = ? WHERE name = ?";
            $request = $this->prepare($sql);
            return $request->execute([$this->entity->getState(),$this->entity->getName()]);
        }
    }

}