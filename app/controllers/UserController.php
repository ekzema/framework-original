<?php

namespace app\controllers;

use app\models\User;
use fw\core\base\Controller;

class UserController extends AppController
{
    public function signupAction()
    {
        if (!empty($_POST)) {
            $data = $_POST;
            $user = new User();
            $user->load($data);
            if (!$user->validation($data) || !$user->checkUnique()) {
                $_SESSION['form_data'] = $data;
                $user->getErrors();
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            if ($user->save()) {
                $_SESSION['success'] = 'Вы успешно зарегистрировались.';
            } else {
                $_SESSION['error'] = 'Произошла ошибка. Попробуйте позже.';
            }
            redirect();
        }
    }

    public function loginAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            if($user->login()) {
                $_SESSION['success'] = 'Вы успешно авторизованы.';
            } else {
                $_SESSION['error'] = 'Логин/пароль введены не верно.';
            }
            redirect();
        }
    }

    public function logoutAction()
    {
        if (isset($_SESSION['user']))
            unset($_SESSION['user']);
        redirect('/user/login');
    }
}