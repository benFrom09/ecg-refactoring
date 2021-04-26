<?php
declare(strict_types=1);

namespace Ecogolf\controllers;

use Ben09\Validator\FormValidator;
use Ecogolf\Core\AuthController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LoginController extends AuthController
{
    public function login(ServerRequestInterface $request,ResponseInterface $response,$args) {
        if($this->auth->user()){
            return $response->withHeader('location','admin/index');
        }
        $messages = $this->checkForSessionMessage();
        $menu_items = $this->getNavbar('site_content')['navbar'];
        $footer = $this->container->get('site_content')['footer'];
        $errors = null;
        if($request->getParsedBody() && !empty($request->getParsedBody())){
            $data = $request->getParsedBody();
            $email = htmlentities($data["email"]);
            $password = htmlentities($data["pwd"]);
            //validate data
            $validator = new FormValidator;
            $validator->validate(["email"=>$email,"password"=>$password]);
            $validator->check('email','email');
            $validator->check('password','isAlphanumeric',"Un mot de passe est requis");
            //check errors
            if(!empty($validator->getErrors())){
                //return error
                $errors = $validator->getErrors();
                $this->session->set("message",["danger"=>"{$errors["email"]} {$errors["password"]}"]);
                return $response->withHeader('location', '/ecg-login');
            } else {
                $user = $this->auth->login('user_email',$email,$password);
                if(!is_null($user)) {
                    return $response->withHeader('location','admin/index');
                } else {
                    $this->session->set("message",["danger"=>"L'email ou le mot de passe sont incorrect!"]);
                    return $response->withHeader('location', '/ecg-login');
                }
            }
           
        }
        $this->renderer->render("pages.login",["menu_items"=>$menu_items,"footer"=>$footer,"messages"=>$messages]);
        return $response;  
    }

    public function logout(ServerRequestInterface $request,ResponseInterface $response,$args) {
        if(array_key_exists("auth",$this->session->all())){
            $this->session->unset('auth');
        }
        return $response->withHeader('location','/');
    }
}