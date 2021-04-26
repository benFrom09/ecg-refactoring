<?php
namespace Ben09\Database\Generic;


trait Select 
{
    public function fetchAll():array {
        return $this->query("SELECT * FROM {$this->table}")->fetchAll();
    }

    public function find(int $id) {
        $query = $this->prepare("SELECT * FROM {$this->table} WHERE {$this->primary_key} = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

}