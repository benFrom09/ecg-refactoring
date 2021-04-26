<?php
declare(strict_types=1);
namespace Ecogolf\Core;

use Ecogolf\Core\interfaces\ViewRendererInterface;
use Exception;
use Twig\TwigFunction;

class TwigViewRenderer implements ViewRendererInterface
{
    protected $twig;
    protected $loader;
    protected $twig_dir;
    protected $globals;

    public function __construct(string $twig_dir,?array $config = [],array $functions = [],array $globals = []) {
        $this->twig_dir = $twig_dir;
        $this->loader = new \Twig\Loader\FilesystemLoader($this->twig_dir);
        $this->twig = new \Twig\Environment($this->loader, []);
        $this->functions = $functions;
        $this->globals = $globals;
        if(!empty($this->functions)) {
            foreach($this->functions as $function) {
                $this->addFunctions($function);
            }
        }
        if(!empty($this->globals)) {
            foreach($this->globals as $key => $global) {
                $this->twig->addGlobal($key,$global);
            }
        }      
    }

    /**
     * Rendering PHP view
     *
     * @param string $view
     * @return void
     */
    public function render(string $view,?array $vars = []):string {
        $view = str_replace(".",DIRECTORY_SEPARATOR,$view) . ".html.twig";
        $file = $this->twig_dir . DIRECTORY_SEPARATOR .  $view;
        if(file_exists($file)){
            echo $this->twig->render($view,$vars);
            return $file;
        } else {
            throw new Exception("RENDERER ERROR $file does not exists");
        }        
    }

    private function addFunctions(TwigFunction $function) {
        return $this->twig->addFunction($function);
    }



    
        
    

    
}