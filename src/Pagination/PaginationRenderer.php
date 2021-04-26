<?php
namespace Ecogolf\Core\Pagination;




class PaginationRenderer
{
    public function __construct(string $file) {
        $this->file = $file;
    }
    public function render() {
        include_once $this->file;
    }
}