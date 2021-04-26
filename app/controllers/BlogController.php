<?php
namespace Ecogolf\controllers;

use Ben09\Database\DBManager;
use Ecogolf\Core\BaseController;
use Ecogolf\models\ArticleManager;
use Ecogolf\Core\Pagination\Pagination;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class BlogController extends BaseController
{
    public function index(ServerRequestInterface $request,ResponseInterface $response,$args) {
        if(isset($args["page"]) && !(int) $args["page"]) return $response->withHeader('location','/blog')->withStatus(301);
        $menu_items = $this->container->get('site_content')['navbar'];
        $footer = $this->container->get('site_content')['footer'];

        $manager = new ArticleManager();
        
        //get nb total articles
        $count = count($manager->fetchAll());
       
            //set current page and check for page param in url set default to 1
            $current_page = isset($args["page"]) ? $args["page"] : 1;
            $per_page = 4;
            //set pagination
            $pagination = new Pagination($count,$per_page,$current_page);
            
            if ($pagination->getCurrentPage() == null) return $this->notFound($response);

            $next_url = $count > 0 ? "/blog/" . $pagination->nextUrlParam():"";
            $prev_url = $count >0 ?"/blog/" . $pagination->prevUrlParam() : "";
            $nb_pages = $pagination->getNbPages();
            //set pagination range
            $articles = $manager->getSlice($pagination->getOffsetIndex(),$pagination->getPerPage());       
            $articles = $manager->getSamples($articles,200);
            $last_insertId = $count > 0 ?$manager->fetchAll()[$count -1]->id : null;       
            $this->renderer->render("pages.news",["menu_items"=>$menu_items,"footer"=>$footer,"articles"=>$articles,"nb_pages"=>$nb_pages,"last_insert_id"=>$last_insertId,"nb_articles"=>$count,"next"=>$next_url,"prev"=>$prev_url]);
            return $response;
    }

    public function show(ServerRequestInterface $request,ResponseInterface $response,$args){
        $menu_items = $this->container->get('site_content')['navbar'];
        $footer = $this->container->get('site_content')['footer'];
        $article = (new ArticleManager())->find($args["id"]);
        if($article){
            $this->renderer->render("pages.show",["menu_items"=>$menu_items,"footer"=>$footer,"_article"=>$article]);
            return $response;
        }
        return $this->notFound($response);   
    }
}