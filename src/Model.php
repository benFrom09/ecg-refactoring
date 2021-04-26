<?php
declare(strict_types=1);

namespace Ecogolf\Core;

use PDO;

class Model
{
   protected $pdo;

   protected $table;

   protected $data;

   protected $primary_key = "id";

    public function __construct(PDO $pdo = null) {  
        if(!is_null($pdo)) {
            $this->pdo = $pdo; 
        }                
    }

    public function fetchAll():array {
        $query = $this->table($this->table)->getPdo()->query("SELECT * FROM $this->table");         
        return $query->fetchAll();
    }

    public function create(?array $data = []):self {
        $this->data = $data;
        return $this;
    }

    public function find(int $id) {
        $query = $this->table($this->table)->getPdo()->prepare("SELECT * FROM $this->table WHERE $this->primary_key = ? ");
        $query->execute([$id]);
        $row = $query->fetch();
        return $row;
    }



    public function get(string $key,string $operator,$value) {
        $query = $this->table($this->table)->getPdo()->prepare("SELECT * FROM $this->table WHERE $key $operator ? ");
        $query->execute([$value]);
        $row = $query->fetch();
        return $row;
    }

    public function delete(string $key,string $operator,$value):bool {
        $query = $this->table($this->table)->getPdo()->prepare("DELETE FROM $this->table WHERE $key $operator ? ");
        $res = $query->execute([$value]);
        return $res;
    }

    public function save() {
        $data = $this->getData();
        $keys = array_keys($data);
        $values = array_values($data);
        $sentence_value = "";
       foreach($values as $value) {
           $sentence_value = $sentence_value . '?, ';
       }
       $sentence_value = substr($sentence_value,0,-2);
        $sentence = implode(", ",$keys);        
        $query = $this->table($this->table)->getPdo()->prepare('INSERT INTO ' .  $this->table . " (" .  $sentence . ') VALUE (' . $sentence_value . ')' );
        $query->execute($values);
        return $query;
    }

    public function table(?string $table = null):self {
        if(is_null($table)) {
            $table = $this->getTableFromClassName();
        }
        $this->table = $table;
        return $this;
    }

    public function prepare(string $sql) {
        return $this->table($this->table)->getPdo()->prepare($sql);
    }

    public function getPdo():PDO {
        return $this->pdo;
    }

    public function getData():array {
        return $this->data;
    }

    public function getTableFromClassName():string{
        $table = explode("\\",get_called_class());
        return strtolower($table[count($table) - 1]) . "s";
    }


}