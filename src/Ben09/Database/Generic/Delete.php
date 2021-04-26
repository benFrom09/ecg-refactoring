<?php
namespace Ben09\Database\Generic;


trait Delete 
{
    
    public function delete(string $key,string $operator,$value) {
        $query = $this->prepare("DELETE FROM {$this->table} WHERE {$key} {$operator} ?");
        $query->execute([$value]);
        return $query;
    }
}