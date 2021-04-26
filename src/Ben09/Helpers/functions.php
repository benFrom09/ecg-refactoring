<?php

function dbConfig(string $key) {

    $dbConfig = require dirname(dirname(__DIR__))."/config/database.php";
        if(array_key_exists($key,$dbConfig)){
            return $dbConfig[$key];
        }
        $value = array_key_exists("default",$dbConfig) ? $dbConfig["connections"][$dbConfig["default"]][$key] : null;
        return $value;
}