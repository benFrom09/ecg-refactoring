<?php
 
 declare(strict_types=1);
  
 namespace Ecogolf\Error;
  
 use Slim\Exception\HttpNotFoundException;
 use Slim\Interfaces\ErrorRendererInterface;
 use Throwable;
  
 final class HtmlErrorRenderer implements ErrorRendererInterface
 {
     public function __invoke(Throwable $exception, bool $displayErrorDetails): string
     {
         $title = 'Error';
         $message = 'An error has occurred.';
         if ($exception instanceof HttpNotFoundException) {
             $title = 'Page Introuvable';
             $message = "La page demandée n'existe pas!";
             
         }
  
         return $this->renderHtmlPage($title, $message);
     }
  
     public function renderHtmlPage(string $title = '', string $message = ''): string
     {
         $title = htmlentities($title, ENT_COMPAT|ENT_HTML5, 'utf-8');
         $message = htmlentities($message, ENT_COMPAT|ENT_HTML5, 'utf-8');
         return <<<EOT
 <!DOCTYPE html>
 <html>
 <head>
   <title>$title - Ecogolf Ariège-Pyrénées</title>
   <head>
     <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto|PT+Serif&amp;display=swap" rel="stylesheet"> 
 <!--CAPTCHA-->
 <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/v1QHzzN92WdopzN_oD7bUO2P/recaptcha__fr.js"></script><script src="https://www.google.com/recaptcha/api.js?render=6Lc1md4UAAAAAEqJXqteM61uIfM3hUy9PnRA2Ga2"></script>
 <!--FONTAWESOME-->
 <link rel="stylesheet" href="/all.css">
 <!--BULMA-->
 <link rel="stylesheet" href="/main.css">
 <!--ECG CSS-->
 <link rel="stylesheet" type="text/css" href="/app.css"> 
 <!--Favicon-->
 <link rel="apple-touch-icon" sizes="57x57" href="storage/favicon/apple-icon-57x57.png">
 <link rel="apple-touch-icon" sizes="60x60" href="storage/favicon/apple-icon-60x60.png">
 <link rel="apple-touch-icon" sizes="72x72" href="storage/favicon/apple-icon-72x72.png">
 <link rel="apple-touch-icon" sizes="76x76" href="storage/favicon/apple-icon-76x76.png">
 <link rel="apple-touch-icon" sizes="114x114" href="storage/favicon/apple-icon-114x114.png">
 <link rel="apple-touch-icon" sizes="120x120" href="storage/favicon/apple-icon-120x120.png">
 <link rel="apple-touch-icon" sizes="144x144" href="storage/favicon/apple-icon-144x144.png">
 <link rel="apple-touch-icon" sizes="152x152" href="storage/favicon/apple-icon-152x152.png">
 <link rel="apple-touch-icon" sizes="180x180" href="storage/favicon/apple-icon-180x180.png">
 <link rel="icon" type="image/png" sizes="192x192" href="storage/favicon/android-icon-192x192.png">
 <link rel="icon" type="image/png" sizes="32x32" href="storage/favicon/favicon-32x32.png">
 <link rel="icon" type="image/png" sizes="96x96" href="storage/favicon/favicon-96x96.png">
 <link rel="icon" type="image/png" sizes="16x16" href="storage/favicon/favicon-16x16.png">
 <link rel="manifest" href="storage/favicon/manifest.json">
 <meta name="msapplication-TileColor" content="#ffffff">
 <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
 <meta name="theme-color" content="#ffffff">
 <!--<script src="https://cdn.tiny.cloud/1/2ufxjqegrf6n1vkmwfvan9fg4t5z99oouc7mlai17uiiysar/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script><!-->
 <script defer="" src="/bundle.js"></script>
 </head>
 <body>
 <section class="not-found">
         <h1>$title</h1>
         <p>$message</p>
         <p><a class="is-default-link" href="/">Retour sur le site</a></p>
 </section>
 </body>
 </html>
 EOT;
     }
 }
