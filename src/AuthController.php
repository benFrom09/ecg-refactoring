<?php
declare(strict_types=1);
namespace Ecogolf\Core;

use PDO;
use Ecogolf\Core\Auth;
use Ecogolf\Core\Session;
use Ecogolf\Core\BaseController;
use Psr\Container\ContainerInterface;
use Ecogolf\Core\interfaces\ViewRendererInterface;

class AuthController extends BaseController
{
    protected $auth;

    public function __construct(ViewRendererInterface $view,PDO $pdo,?Session $session,?ContainerInterface $container) {
        parent::__construct($view,$pdo,$session,$container);
        if(is_null($this->auth)) {
             $this->auth = new Auth($this->pdo,$this->session);
        }  
    }
}