<?php
namespace Ben09\Validator;

use DateTime;

class FormValidator
{
    protected $data;

    protected $errors = [];


    /**
     * validate form entry
     *
     * @param array $data
     * @return FormValidator
     */
    public function validate(array $data):self {
        $this->errors = [];
        $this->data = $data;
        return $this;
    }

    public function check(string $field,string $method,...$params) {
        d($field);
        if(!array_key_exists($field,$this->data)){
            $this->errors[$field] = "Le champs $field est obligatoire!";
        } else {
            var_dump($method);
            return call_user_func([$this,$method],$field,...$params);
        }
    }

    public function minLength(string $field,int $len) {
        if(strlen($this->data[$field]) < $len) {
            $this->errors[$field] = "Le champs $field doit contenir au minimum $len caractères ";
            return false;
        }
        return true;
    }

    public function date(string $field) {
        if(DateTime::createFromFormat('Y-m-d',$this->data[$field]) === false) {
            $this->errors[$field] = "Le format de la date est invalide!";
            return false;
        }
        return true;
    }

    public function time(string $field) {
        if(DateTime::createFromFormat('H:i',$this->data[$field]) === false) {
            $this->errors[$field] = "Le format de l'heure est invalide!";
            return false;
        }
        return true;
    }

    public function isBefore(string $start,string $end) {
        if($this->time($start) && $this->time($end)) {
            $startTime = DateTime::createFromFormat('H:i',$this->data[$start]);
            $endTime = DateTime::createFromFormat('H:i',$this->data[$end]);
            if($startTime->getTimestamp() > $endTime->getTimestamp()) {
                $this->errors[$start] = "L'heure de début doit être inférieure à l'heure d'arrivée!";
                return false;
            }
            return true;
        }
        $this->errors[$start] = "Un des champs $start ou $end est incorrect!";
        return false;
    }

    public function email(string $field) {
        if(filter_var($this->data[$field],FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        $this->errors[$field] = "Adresse email invalide!";
        return false;
    }

    public function isAlphanumeric(string $field):bool{
        echo $this->data[$field];
        return true;
    }

    public function getErrors():array {
        return $this->errors;
    }
}