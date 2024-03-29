<?php

namespace fw\core\base;

use fw\core\App;

class View
{
    public $route = [];

    public $view;

    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    public function render($vars)
    {
        Lang::load(App::$app->getProperty('lang'), $this->route);
        $this->route['prefix'] = str_replace('\\', '/', $this->route['prefix']);
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