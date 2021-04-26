<?php
declare(strict_types=1);
namespace Ecogolf\Core;

use PDO;
use Ecogolf\Core\Session;
use Exception;



class Auth extends Model
{
    protected $session;

    protected $pdo;

    protected $authorized = false;

    protected $table = "users";

    protected $primary_key = "user_id";

    public function __construct(PDO $pdo,Session $session = null) {
        parent::__construct($pdo);
        $this->pdo = $pdo;
        $this->session = $session;
    }

    public function login($key,$data,$password,$table = null) {
        if (is_null($table)) {
            $table = "users";
        }
        $request = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$key} = ? ");
        $request->execute([$data]);
        $user = $request->fetch();
        if($user) {
            if(password_verify($password,$user->user_password)) {
                if(!$this->authorized){
                    $this->session->set("auth",$user->user_name . "/*" . $user->user_id);
                    $this->authorized = true;    
                }
                return $user;
            }
            //throw new Exception("Password or email does not match the database");
            return null;
        }
        return null;
    }

    public function logout() {
        $this->session->unset("auth");
        $this->authorized = false;
        return array_key_exists($this->session->get("auth"),$_SESSION);
    }

    public function isLogged():bool {

        return !is_null($this->session->get('auth')) && !empty($this->session->get('auth'));
    }

    public function user(){
        if(!is_null($this->session->get('auth')) && !empty($this->session->get('auth'))){
            $id = explode('/*',$this->session->get('auth'))[1];
            $user = $this->find(intval($id));
            return $user;
        }
        return null;

    }

    private function generateToken() {
        return bin2hex(random_bytes(16));
    }

}