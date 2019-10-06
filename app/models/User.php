<?php


namespace app\models;

use fw\core\base\Model;

class User extends Model
{
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

}