<?php
declare(strict_types=1);
namespace Ecogolf\Core;

use PDO;
use Psr\Container\ContainerInterface;
use Ecogolf\Core\interfaces\ViewRendererInterface;
use Psr\Http\Message\ResponseInterface;

class BaseController
{
    protected $renderer;

    protected $pdo;

    protected $container;

    protected $session;

    public function __construct(ViewRendererInterface $view,PDO $pdo,?Session $session,?ContainerInterface $container) {
        $this->renderer = $view;
        $this->pdo = $pdo;
        $this->container = $container;
        $this->session = $session;
    }

    public function getNavbar(string $navbar) {
        return $this->container->get($navbar);
    }

    public function checkForSessionMessage() {
        if(!is_null($this->session->get("message")) && !empty($this->session->get("message"))) {
            $session_message = $this->session->get("message");
            $this->session->unset("message");
            return $session_message;
        }
        return null;
    }

    public function notFound(ResponseInterface $response):ResponseInterface {
        $message = "La ressource demandée n'existe pas ou a été supprimé!";
        $this->renderer->render("errors.404",["message" => $message]);
        return $response->withStatus(404);
    }
}