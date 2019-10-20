<?php


namespace app\controllers\admin;


class UserController extends AppController
{
    public function indexAction()
    {
        $test = 'Тестова переменная';
        $data = ['test', 2];
        $this->set(compact('test', 'data'));
    }

    public function loginAction()
    {
        echo __METHOD__;
    }

    public function testAction()
    {
        echo __METHOD__;
    }
}