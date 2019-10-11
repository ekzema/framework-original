<?php

namespace fw\libs;

class Pagination
{
    public $currentPage;
    public $perpage;
    public $total;
    public $countPage;
    public $url;

    public function __construct($page, $perpage, $total)
    {
        $this->perpage = $perpage;
        $this->total = $total;
        $this->countPage = $this->getCountPage();
        $this->currentPage = $this->getCurrentPage();
        $this->url = $this->getParam;
    }
}