<?php
namespace app\controllers;
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 09.10.2017
 * Time: 2:23
 */
class PostsController extends AppController
{

    public function indexAction()
    {
        echo 'Posts::index';
    }

    public function testAction()
    {
        echo 'Posts::test';
    }
}