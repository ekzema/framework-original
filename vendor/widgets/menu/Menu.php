<?php
namespace vendor\widgets\menu;
use app\models\Categories;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container;
    protected $table;
    protected $cache;

    public function __construct()
    {
        $this->run();
    }

    public function run()
    {
        $categoryObject = new Categories();
        $this->data = $categoryObject->finadAllUnique();
        $this->tree = $this->getTree();
        print_r($this->tree);exit;
    }

    protected function getTree()
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id=>&$node) {
            if (!$node['parent']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '')
    {

    }

    protected function catToTemplate($category, $tab, $id) {

    }
}