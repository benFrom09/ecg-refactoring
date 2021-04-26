<?php
return [


    "options" => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ],

    "default" => "mysql",

    "connections" => [
        // MySQL
        "mysql" => [
            "driver" =>$_ENV['DB_DRIVER'], //"mysql"
            "host_name" =>$_ENV['DB_HOST'], /*"golfarie.mysql.db"*/
            "db_name" => $_ENV['DB_NAME'],
            "db_user" => /*"golfarie"*/$_ENV['DB_USER'],
            "db_password" => /*"8326dbax1765"*/$_ENV['DB_PASSWORD'],
            "charset"=>$_ENV['charset']
        ],
    ]
];
