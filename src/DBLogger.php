<?php
declare(strict_types=1);
namespace Ecogolf\Core;


class DBLogger
{
    protected $settings;

    protected $dsn;

    protected $user;

    protected $pass;

    protected $pdoAttributes;

    public function __construct(?string $file) {
        $this->settings = require $file;
        foreach($this->settings as $keys => $value){
            switch($keys) {                
                case "mysql": 
                    $this->dsn = "mysql:dbname=" .$value["db_name"] . ";host="  .$value["db_host"];
                    $this->user = $value["db_user"];
                    $this->pass = $value["db_pass"];
                    $this->pdoAttributes = $value["db_options"];
                break;
            }
        }
        
    }

    public function getDsn():string {
        return $this->dsn;
    }

    public function getUser():string {
        return $this->user;
    }

    public function getPass():string {
        return $this->pass;
    }

    public function getOptions():?array {
        return $this->pdoAttributes;
    }
}