<?php
namespace Ecogolf\Core\Pagination;




class Pagination
{
    /**
     *
     * @var int
     */
    protected $total_items;
    /**
     *
     * @var int
     */
    protected $per_page;
    /**
     *
     * @var int
     */
    protected $current_page;

    protected $nb_pages;

    public function __construct(int $total_items,int $per_page,int $current_page) {
        $this->total_items = $total_items;
        $this->per_page = $per_page;
        $this->nb_pages = $this->setNbpages();
        $this->setCurrentPage($current_page);

        $this->updateCurrent();

        $this->getCurrentPage();
              
    }

    private function setNbpages():int {
       return ceil($this->total_items / $this->per_page);
    }

    private function setCurrentPage(int $current_page) {
        
        $this->current_page = isset($current_page) && !is_null($current_page) ? $current_page : 1 ; 
    }

    private function updateCurrent() {
        $this->current_page = $this->current_page > $this->nb_pages || $this->current_page < 1 ? 1 : $this->current_page;
    }
    
    public function getTotalItems():int {
        return $this->total_items;
    }

    public function nextUrlParam():int {
        return $this->current_page <= $this->nb_pages -1 ? $this->current_page + 1 : $this->current_page;
    }

    public function prevUrlParam():int {
        return $this->current_page > 1 ? $this->current_page - 1 : $this->current_page;
    }

    public function getOffsetIndex():int {
        return ($this->current_page * $this->per_page) - $this->per_page;
    }

    public function getPerPage():int {
        return $this->per_page;
    }

    public function getCurrentPage() {
        return $this->current_page;
    }

    public function getNbPages() {
        return $this->nb_pages;
    }
}