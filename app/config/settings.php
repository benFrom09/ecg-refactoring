<?php
declare(strict_types=1);

use GuzzleHttp\Psr7\ServerRequest;

$base_url = ServerRequest::fromGlobals()->getHeaders()["Host"];

$dotenv = Dotenv\Dotenv::createImmutable(dirname(dirname(__DIR__)));
$dotenv->load();

define("BASE_DIR",dirname(dirname(__DIR__)));
define("VIEWS",BASE_DIR . DIRECTORY_SEPARATOR . "twig_views");
define("STORAGE",BASE_DIR . "/public/storage");
define("METEO_API_KEY","86ce0bb3cf6b345a241ed6390f93bfd9");
define("CAPTCHA_SITE_KEY","6Lc1md4UAAAAAEqJXqteM61uIfM3hUy9PnRA2Ga2");
define("CAPTCHA_SECRET_KEY","6Lc1md4UAAAAALcz3sRgIDjJUUhGGTqUb4yTzByz");


$settings = [
                
                "app_name" =>$_ENV['APP_NAME'],//"Ecogolf Ariège-Pyrénées",
                "app_locale" =>$_ENV["APP_LOCALE"],
                "app_debug" => $_ENV["APP_DEBUG"],
                "per_page"=> 2,
                "providers" => [
                    \Ecogolf\Providers\RouteServiceProvider::class
                ]
            ];
return $settings;
