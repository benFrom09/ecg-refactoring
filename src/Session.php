<?php
declare(strict_types=1);

namespace Ecogolf\Core;

use ArrayAccess;

class Session implements ArrayAccess
{


    public function __construct() {
       if(session_status() === PHP_SESSION_NONE) {
           session_start();
       }
       
    }

    public function get(string $key) {
        if(array_key_exists($key,$_SESSION)) {
            return $_SESSION[$key];
        }
        return NULL;
    }

    public function all() {
        return $_SESSION;
    }

    public function set(string $key,$value) {
        $_SESSION[$key] = $value;
        return $_SESSION;
    }

    public function unset(string $key) {
        unset($_SESSION[$key]);
        return $key;
    }

    public function purge(){
        foreach($_SESSION as $keys) {
            unset($_SESSION[$keys]);
        }
    }

    public function end() {
        session_destroy();
    }

    public function offsetExists($offset)
    {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return array_key_exists($offset,$_SESSION);
    }

    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        return $this->set($offset,$value);
    }

    public function offsetUnset($offset)
    {
        $this->unset($offset);
    }

    
}