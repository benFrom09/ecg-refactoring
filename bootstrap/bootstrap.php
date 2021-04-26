<?php
declare(strict_types = 1);


use DI\ContainerBuilder;
use Ecogolf\Core\Session;
use Slim\Factory\AppFactory;
use Ecogolf\Error\HtmlErrorRenderer;
use Ecogolf\Providers\ServiceProvider;
use Ecogolf\Core\Handlers\HttpErrorHandler;
use Slim\Psr7\Factory\ServerRequestFactory;
use Ecogolf\Core\Middlewares\CSRFMiddleware;
use Ecogolf\Core\Middlewares\TrailingSlashMiddleware;

$settings = require dirname(__DIR__) . "/app/config/settings.php";


//todo => add this in a middleware
$language_file = null;
$session = new Session();

if(is_null($session->get('lang'))) {
    $lang = get_browser_lang(ServerRequestFactory::createFromGlobals(),[],'fr');
    $session->set('lang',$lang);
}

switch($session->get('lang')) {
    case 'fr': 
        $language_file = require '../resources/lang/fr.php';
    break;
    /*
    case 'en-GB': 
        $language_file = require '../resources/lang/en.php';
    break;
    case 'en-US': 
        $language_file = require '../resources/lang/en.php';
    break;
    */
    default: 
        $language_file = require '../resources/lang/fr.php';
}


//Slim debug errors
$displayErrorDetails = false;

//Create container
$builder = new ContainerBuilder();

$builder->addDefinitions(require dirname(__DIR__) . '/app/config/definitions.php');


$container = $builder->build();
AppFactory::setContainer($container);

//create application
$app = AppFactory::create();


$callableResolver = $app->getCallableResolver();
$responseFactory = $app->getResponseFactory();

$errorHandler = new HttpErrorHandler($callableResolver,$responseFactory);

$app->addErrorMiddleware(true,true,true);

$app->addRoutingMiddleware();

$app->add(new TrailingSlashMiddleware(true));
$app->add(new CSRFMiddleware($session));

//START SERVICE PROVIDERS
ServiceProvider::setUp($app,$settings['providers']);

$errorMiddleware = $app->addErrorMiddleware($displayErrorDetails, false, false);
//$errorMiddleware->setDefaultErrorHandler($errorHandler);
$errorHandler = $errorMiddleware->getDefaultErrorHandler();
$errorHandler->registerErrorRenderer('text/html', HtmlErrorRenderer::class);

return $app;
