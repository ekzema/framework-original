<?php

namespace app\controllers;

use fw\core\App;

class LanguagesController extends AppController
{
    public function changeAction()
    {
        $lang = $_GET['lang'];
        if ($lang) {
            if (array_key_exists($lang, App::$app->getProperty('langs'))) {
                setcookie('lang', $lang, time() + 3600 * 24 * 7, '/');
            }
        }
        redirect();
    }
}