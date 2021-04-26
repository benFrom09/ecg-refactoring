<?php

namespace Ecogolf\controllers\admin;

use Ecogolf\models\Gprix;
use Ecogolf\Core\AuthController;
use Ecogolf\models\GprixManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GrandPrixController extends AuthController
{
    public function index(ServerRequestInterface $request, ResponseInterface $response,$args)
    {
        
        $manager = new GprixManager();
        
        $last_id = $manager->lastId();
        $content = $manager->find($last_id);
        
        

        $this->renderer->render("admin.pages.admin_gprix",[
            'gprix_content'=> $content->getAll()
        ]);
        return $response;
    }

    public function update(ServerRequestInterface $request, ResponseInterface $response,$args) {
        $data = $request->getParsedBody();
        $manager = new GprixManager();

        $content = $manager->hydrate(new Gprix(),[
            'content' => $data['content'],
            'date' => $data['date'],
            'title' => $data['title'],
            'nb_max_player' => $data['nb_max_player'],
            'id' => 1
        ])->update();

        if($content) {
            return $response->withHeader('location', '/admin/gprix');
        }

        return $response;
    }
}