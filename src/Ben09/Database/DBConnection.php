<?php
declare(strict_types=1);

namespace Ben09\Database;

use PDO;


class DBConnection
{
    use DBProvider;

    protected $connection;

    public function __construct() {
        $method = dbConfig("default");
        if(method_exists($this,$method)) {
            $this->connection = $this->$method();
        }
    }

    public function getConnection():PDO {
        return $this->connection;
    }

    
}