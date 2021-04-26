<?php
declare(strict_types=1);

use Ecogolf\controllers\BlogController;
use Ecogolf\controllers\HomeController;
use Ecogolf\controllers\AboutController;
use Ecogolf\controllers\LoginController;
use Ecogolf\controllers\PriceController;
use Ecogolf\controllers\ContactController;
use Ecogolf\Core\Middlewares\AuthMiddleware;
use Ecogolf\controllers\admin\AdminController;
use Ecogolf\controllers\admin\BlogController as AdminBlogController;
use Ecogolf\controllers\admin\EventController;
use Ecogolf\controllers\admin\GrandPrixController as AdminGrandPrixController;
use Ecogolf\controllers\EventController as ControllersEventController;
use Ecogolf\controllers\GrandPrixController;
use Ecogolf\controllers\WininoneController;
use Ecogolf\Support\Route;

Route::get("/", HomeController::class);
Route::post("/", HomeController::class);
Route::get("/about", AboutController::class);
Route::get("/contact", ContactController::class);
Route::get("/competitions", ControllersEventController::class . ":index");

Route::get("/blog[/{page}]", BlogController::class . ":index");
Route::get("/blog/article/{id}", BlogController::class . ":show");

Route::get("/ecg-login", LoginController::class . ":login");
Route::post("/ecg-login", LoginController::class . ":login");

Route::get("/prices", PriceController::class . ":index");

Route::get("/grand-prix", GrandPrixController::class);

//Route::get("/wininone",WininoneController::class);

Route::get("/admin/logout", LoginController::class . ":logout")->add(new AuthMiddleware());

Route::get("/admin/index", AdminController::class . ":index")->add(new AuthMiddleware());
Route::get("/admin", AdminController::class . ":index")->add(new AuthMiddleware());
Route::post("/admin/index", AdminController::class . ":editCourses")->add(new AuthMiddleware());
Route::post("/admin", AdminController::class . ":editCourses")->add(new AuthMiddleware());
Route::post("/admin/index/edit-prices", AdminController::class . ":editPrices")->add(new AuthMiddleware());
Route::post("/admin/index/edit-bapteme", AdminController::class . ":editBapteme")->add(new AuthMiddleware());
Route::post("/admin/index/edit-advantage", AdminController::class . ":editAdvantage")->add(new AuthMiddleware());
Route::post("/admin/index/edit-offers", AdminController::class . ":editSpecialOffer")->add(new AuthMiddleware());

Route::get("/admin/events[/{month}/{year}]", EventController::class . ":index")->add(new AuthMiddleware());

Route::get("/admin/event/edit/{id}", EventController::class . ":editEvent")->add(new AuthMiddleware());
Route::post("/admin/event/edit/{id}", EventController::class . ":updateEvent")->add(new AuthMiddleware());
Route::post("/admin/event/delete/{id}", EventController::class . ":deleteEvent")->add(new AuthMiddleware());

Route::get("/admin/event/add[/{date}]", EventController::class . ":addEvent")->add(new AuthMiddleware());
Route::post("/admin/event/add[/{date}]", EventController::class . ":addEvent")->add(new AuthMiddleware());

Route::get("/admin/articles[/{page}]", AdminBlogController::class . ":blogIndex")->add(new AuthMiddleware());

Route::get("/admin/article/add", AdminBlogController::class . ":addArticle")->add(new AuthMiddleware());
Route::post("/admin/article/add", AdminBlogController::class . ":addArticle")->add(new AuthMiddleware());

Route::get("/admin/article/{id}", AdminBlogController::class . ":show")->add(new AuthMiddleware());;
Route::post("/admin/article/edit/{id}", AdminBlogController::class . ":editArticle")->add(new AuthMiddleware());
Route::post("/admin/article/delete/{id}", AdminBlogController::class . ":delete")->add(new AuthMiddleware());
    
Route::get("/admin/gprix",AdminGrandPrixController::class . ":index")->add(new AuthMiddleware());
Route::post("/admin/gprix",AdminGrandPrixController::class . ":update")->add(new AuthMiddleware());
    
    //Route::get("/test",TestController::class);
