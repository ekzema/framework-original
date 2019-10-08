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

    }

    public function logoutAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            if($user->login()) {

            } else {

            }
        }
    }
}