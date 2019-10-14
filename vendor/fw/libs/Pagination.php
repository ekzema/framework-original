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
        $this->currentPage = $this->getCurrentPage($page);
        $this->url = $this->getParams();
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public function getHtml()
    {
        $back = null;
        $forward = null;
        $startpage = null;
        $endpage = null;
        $page2left = null;
        $page1left = null;
        $page2right = null;
        $page1right = null;
        if ($this->currentPage > 1) {
            $back = "<li><a class='nav-link' href='{$this->url}page=" . ($this->currentPage - 1) . "'>&lt;</a></li>";
        }
        if ($this->currentPage < $this->countPage) {
            $forward = "<li><a class='nav-link' href='{$this->url}page=" . ($this->currentPage + 1) . "'>&lt;</a></li>";
        }
        if ($this->currentPage > 3) {
            $startpage = "<li><a class='nav-link' href='{$this->url}page=1'>&laquo;</a></li>";
        }
        if ($this->currentPage < ($this->countPage - 2)) {
            $endpage = "<li><a class='nav-link' href='{$this->url}page={$this->countPage}'>&raquo;</a></li>";
        }
        if ($this->currentPage - 2 > 0) {
            $page2left = "<li><a class='nav-link' href='{$this->url}page=" . ($this->currentPage - 2) . "'>" . ($this->currentPage - 2) . "</a></li>";
        }
        if ($this->currentPage - 1 > 0) {
            $page1left = "<li><a class='nav-link' href='{$this->url}page=" . ($this->currentPage - 1) . "'>" . ($this->currentPage - 1) . "</a></li>";
        }

        if ($this->currentPage + 2 > 0) {
            $page2right = "<li><a class='nav-link' href='{$this->url}page=" . ($this->currentPage + 2) . "'>" . ($this->currentPage + 2) . "</a></li>";
        }
        if ($this->currentPage + 1 > 0) {
            $page1right = "<li><a class='nav-link' href='{$this->url}page=" . ($this->currentPage + 1) . "'>" . ($this->currentPage + 1) . "</a></li>";
        }
        return '<ul class="pagination">' . $startpage . $back . $page2left . $page1left .  '<li class="active"><a>'
            . $this->currentPage . '</a></li>' . $page1right . $page2right . $forward . $endpage;
    }

    public function getCountPage()
    {
        return ceil($this->total / $this->perpage) ? : 1;
    }

    public function getCurrentPage($page)
    {
        if (!$page || $page < 1)
            $page = 1;
        if ($page > $this->countPage) $page = $this->countPage;
        return $page;
    }

    public function getStart()
    {
        return ($this->currentPage -1) * $this->perpage;
    }

    public function getParams()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if (isset($url[1]) && $url[1] != '') {
            $params = explode('&', $url[1]);
            foreach ($params as $param) {
                if (!preg_match("#page=#", $param)) $uri .= "{$param}&amp;";
            }
        }
        return $uri;
    }
}