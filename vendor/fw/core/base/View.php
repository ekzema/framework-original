<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 12.12.2017
 * Time: 23:54
 */

namespace vendor\core\base;


class View
{
    public $route = [];

    public $view;

    public $layout;

    public function __construct($route, $layout = '', $view = '') {
        $this->route = $route;
        if($layout === false){
            $this->layout = false;
        }else{
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    public function render($vars){
        if(is_array($vars)) extract($vars);
        $file_view = APP . "/views/{$this->route['prefix']}{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if(is_file($file_view)){
            require $file_view;
        } else{
            throw new \Exception("<p>Не найден вид <b>$file_view</b></p>", 404);
        }
        $content = ob_get_clean();
        if(false !== $this->layout){
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($file_layout)){
                require $file_layout;
            } else {
                throw new \Exception("<p>Не найден шаблон <b>$file_layout</b></p>", 404);
            }
        }
    }
}