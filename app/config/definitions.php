<?php
declare(strict_types = 1);
use Ecogolf\Core\Session;
use Twig\TwigFunction;
use Ecogolf\Core\TwigViewRenderer;
use Ecogolf\Core\interfaces\ViewRendererInterface;
use Ecogolf\Core\Middlewares\CSRFMiddleware;

return [
    
    ViewRendererInterface::class => function() use($settings) {
        $renderer =  new TwigViewRenderer(dirname(dirname(__DIR__)) . '/twig_views',[],[
            new TwigFunction('isAuth',function() {
                return isAuth();
            }),
            new TwigFunction('formatDateToFrench',function(...$args){
                return formatDateToFrench(...$args);
            }),
            new TwigFunction('csrf_input',function(){
                $session = new Session();
                $middleware = new CSRFMiddleware($session);
                return '<input type="hidden" name="' . $middleware->getKey() .'" value="'. $middleware->generateToken() .'"/>';
            },),
            new TwigFunction('hasLink',function($str,$classname){
                return detectLink($str,$classname);
            })
        ],
        [
            "SITE_NAME" => $settings["app_name"],
            "CAPTCHA_SITE_KEY" => CAPTCHA_SITE_KEY,
            "CAPTCHA_SECRET_KEY" => CAPTCHA_SECRET_KEY
        ]);
        return $renderer;
    },
    
    PDO::class => function() {
        $pdo = new PDO(
                        "mysql:host=" . dbConfig("host_name") . ";dbname="
                        . dbConfig("db_name"),dbConfig("db_user"),
                        dbConfig("db_password"),dbConfig("options")
                        );
        $pdo->exec("set names " . 'utf8');
        return $pdo;
    },

    Session::class => function() {
        return new Session();
    },

    'site_content' => function() use($language_file) {
        return $language_file;
    },

];