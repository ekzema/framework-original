<?php


namespace app\models;

use fw\core\base\Model;

class User extends Model
{
    public $table = 'user';

    public $attributes = [
      'name' => '',
      'login' => '',
      'email' => '',
      'password' => ''
    ];

    public $rules = [
        'required' => [
            ['login'],
            ['name'],
            ['email'],
            ['password']
        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['password', 6]
        ]
    ];

    public function checkUnique()
    {
        $params = $this->attributes;
        $user = $this->findBySql(
            "SELECT * FROM $this->table WHERE email = ? OR login = ? LIMIT 1",
            [$params['email'], $params['login']]
        );
        if ($user) {
            if ($user['login'] == $params['login'])
                $this->errors['unique'][] = 'Этот логин уже занят';
            if ($user['email'] == $params['email'])
                $this->errors['unique'][] = 'Этот почта уже занята';
            return false;
        }
        return true;
    }

    public function login()
    {
        $login = trim($_POST['login']);
        $password = trim($_POST['password']);
        if ($login && $password) {
            $user = $this->findBySql(
                "SELECT * FROM $this->table WHERE login = ? LIMIT 1",
                [$login]
            );
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    unset($user['password']);
                    $_SESSION['user'] = $user;
                    return true;
                }
            }
        }
        return false;
    }
}