<?php
namespace Ecogolf\Core\interfaces;


interface ViewRendererInterface
{
    /**
     * Render the viewfile
     *
     * @param string $view
     * @param array|null $vars
     * @return string
     */
    public function render(string $view,?array $vars = []) : string;
}

