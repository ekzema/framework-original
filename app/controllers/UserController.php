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
            if ($user->validation($data)) {
                echo "Ok";
            } else {
                echo "No";
            }
        }
    }

    public function loginAction()
    {

    }

    public function logoutAction()
    {

    }
}