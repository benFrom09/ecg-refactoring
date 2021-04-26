<?php

namespace Ecogolf\controllers\admin;

use Ben09\File\FileManager;
use DateTime;
use Ecogolf\models\Article;
use Ecogolf\Core\AuthController;
use Ecogolf\Core\Pagination\Pagination;
use Ecogolf\models\ArticleManager;
use Ecogolf\models\ImageManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;




class BlogController extends AuthController
{
    public function blogIndex(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        // check for session message 
        $session_message = $this->checkForSessionMessage();
        //set up article manager 
        $manager = new ArticleManager();
        //get nb total articles
        $count = count($manager->fetchAll());
        //set current page and check for page param in url set default to 1
        $current_page = isset($args["page"]) ? $args["page"] : 1;
        $per_page = 2;
        //set pagination
        $pagination = new Pagination($count, $per_page, $current_page);
        if ($pagination->getCurrentPage() == null) return $this->notFound($response);
        $next_url = "/admin/articles/" . $pagination->nextUrlParam();
        $prev_url = "/admin/articles/" . $pagination->prevUrlParam();
        $nb_pages = $pagination->getNbPages();
        //set pagination range
        $articles = $manager->getSlice($pagination->getOffsetIndex(), $pagination->getPerPage());
        $this->renderer->render("admin.pages.admin_articles", ["articles" => $articles, "nb_pages" => $nb_pages, "nb_articles" => $count, "next" => $next_url, "prev" => $prev_url, "messages" => $session_message]);
        return $response;
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        $session_message = $this->checkForSessionMessage();
        $article = (new ArticleManager())->find($args["id"]);
        if ($article) {
            $this->renderer->render("admin.pages.admin_edit_article", ["article" => $article, "messages" => $session_message]);
            return $response;
        }
        return $this->notFound($response);
    }

    public function editArticle(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        $session_message = $this->checkForSessionMessage();
        $data = $request->getParsedBody();
        $image = $request->getUploadedFiles();
        $fileManager = new FileManager($request, "article_image");
        if (!empty($data["article_title"]) && !empty($data["article_content"])) {
            $manager = new ArticleManager();
            if (!is_null($fileManager->getFile())) {
                if (!$fileManager->getError()) {
                    //check for image in folder                     
                    //get image name from db
                    $old_image = $manager->find($args["id"])->getImage();
                    //if in directory erase it;
                    if (!is_null($old_image)) {
                        $toDelete = $fileManager->deleteImageFromDirectory($old_image, STORAGE . "/blog");
                    }
                    $fileManager->moveTo(STORAGE . "/blog");
                    $new_image = $fileManager->getNewFileName();
                } else {
                    $this->session->set("message", ["danger" => "Une erreur est survenue, l'image ne doit pas dépasser 2 Mo ou a été partiellement téléchargée!"]);
                    $new_image = NULL;
                }
            } else {
                $new_image = $data["image"] ?? NULL;
            }

            $article = $manager->hydrate(new Article(), [
                "id" => intval($args["id"]),
                "title" => $data["article_title"],
                "content" => $data["article_content"],
                "author" => $data["article_author"],
                "date" => $data["date"],
                "image" => $new_image
            ])->update();
            if ($article) {
                $this->session->set("message", ["success" => "L'article {$data['article_title']} a bien été modifié"]);
                return $response->withHeader('location', '/admin/articles');
            }
            return $this->notFound($response);
        }
        $this->session->set("message", ["danger" => "Les champs titre et contenus ne doivent pas être vide!"]);
        return $response->withHeader('location', '/admin/article/' . $args['id']);
    }

    public function addArticle(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        $session_message = $this->checkForSessionMessage();
        $data = $request->getParsedBody();
        if ($data) {
            $image = $request->getUploadedFiles();
            if (!empty($data["article_title"]) && !empty($data["article_content"])) {
                $imageManager = new FileManager($request, "article_image");
                if (!is_null($imageManager->getFile())) {
                    if (!$imageManager->getError()) {
                        $imageManager->moveTo(STORAGE . DIRECTORY_SEPARATOR . "blog");
                        $new_image = $imageManager->getNewFileName();
                    } else {
                        $this->session->set("message", ["danger" => "Une erreur est survenue, l'image ne doit pas dépasser 2 Mo ou a été partiellement téléchargée!"]);
                        $new_image = NULL;
                    }
                } else {
                    $new_image = NULL;
                }

                $manager = new ArticleManager();
                $article = $manager->hydrate(new Article(), [
                    "title" => $data["article_title"],
                    "content" => $data["article_content"],
                    "author" => $data["article_author"],
                    "date" => $data["date"],
                    "image" => $new_image
                ])->save();

                return $response->withHeader('location', '/admin/articles');
            } else {
                $this->session->set("message", ["danger" => "Le champ titre et le champ contenu ne doivent pas être vide lors de l'ajout d'un article!"]);
                return $response->withHeader('location', '/admin/articles');
            }
        }
        $this->renderer->render("admin.pages.admin_add_article", ["messages" => $session_message]);
        return $response;
    }

    public function delete(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        $name = $request->getParsedBody()["article_title"];
        $manager = new ArticleManager();
        $article = $manager->delete("id", "=", intval($args["id"]));
        if ($article) {
            $this->session->set("message", ["success" => "L'article {$name} a bien été supprimé"]);
            return $response->withHeader('location', '/admin/articles');
        }
        return $this->notFound($response);
    }
}
