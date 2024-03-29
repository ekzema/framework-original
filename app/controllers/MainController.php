<?php

namespace app\controllers;
use app\models\Categories;
use app\models\Main;
use fw\core\App;
use fw\libs\Pagination;
use fw\widgets\language\Language;
use fw\widgets\menu\Menu;

/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 09.10.2017
 * Time: 2:23
 */
class MainController extends AppController
{
//    public $layout = 'main';
    public function indexAction()
    {
//        $this->layout = false;
//        $res = $model->query("CREATE TABLE posts SELECT * FROM blog.bl_posts");
        new Language();
        $model = new Main;
        $total = $model->count();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 2;
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        $posts = $model->findBySql("SELECT * FROM posts LIMIT {$start}, {$perpage}");
//        App::$app->cache->set('posts', $posts);
//        App::$app->cache->get('posts');
//        App::$app->cache->delete('posts');
//        $post = $model->findOne(1);
//        $data = $model->findBySql("SELECT * FROM posts ORDER BY id DESC LIMIT 2");
        $data = $model->findLike('e', 'title');
        $name = 'Денис';
        $this->set(['name' => $name, 'posts' => $posts, 'pagination' => $pagination]);
    }

    public function testAction()
    {
        if ($this->isAjax()) {
            echo 'This response Json';
            exit;
        }
        echo 'This response Html';
    }
}