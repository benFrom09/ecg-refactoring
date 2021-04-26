<?php

namespace Ecogolf\Core;

class Cookie
{
    public static function setCookie($name,$value,$expire,$path = null,$domain = null,$secure = null,$httponly = true){
        $value = json_encode($value);
        setcookie($name,$value,$expire,$path,$domain,$secure,$httponly);
    }

    public static function getCookie(string $name){
        if (array_key_exists($name,$_COOKIE)){
            return json_decode($_COOKIE[$name]);
        }
        return NULL;
    }
}