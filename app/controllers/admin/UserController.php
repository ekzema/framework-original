<?php


namespace app\controllers\admin;


class UserController extends ApController
{
    public function indexAction()
    {
        $test = 'Тестова переменная';
        $data = ['test', 2];
        $this->set(compact('test', 'data'));
    }

    public function testAction()
    {
        echo __METHOD__;
    }
}