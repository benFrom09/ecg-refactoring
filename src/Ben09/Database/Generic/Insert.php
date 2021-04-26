<?php
namespace Ben09\Database\Generic;

use Ben09\Database\Entities\Entity;

trait Insert 
{
    /**
     * Insert new data into table
     *
     * @param array $data
     * @return void
     */
    public function new(array $data) {
        $keys = array_keys($data);
        $values = array_values($data);
        $sentence_value = "";
        foreach ($values as $value) {
            $sentence_value = $sentence_value . '?, ';
        }
        $sentence_value = substr($sentence_value, 0, -2);
        $sentence = implode(", ", $keys);

        $sql= "INSERT INTO {$this->table} ($sentence) VALUE ($sentence_value)";
        $query = $this->prepare($sql);
        $query->execute($values);
        return $query;
    }

}