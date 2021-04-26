<?php
namespace Ben09\Database;

use PDO;

trait DBProvider
{
    

    protected function mysql() {
        $pdo = new PDO(
                            "mysql:host=" . dbConfig("host_name") . ";dbname="
                             . dbConfig("db_name") . ";charset=" . dbConfig("charset"),dbConfig("db_user"),
                            dbConfig("db_password"),dbConfig("options")
                            );
        return $pdo;
    }
}