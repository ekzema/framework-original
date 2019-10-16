<?php

namespace app\controllers;
use fw\core\App;
use fw\core\base\Controller;
use app\models\Main;
use fw\widgets\language\Language;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new Main();
        App::$app->setProperty('lang', Language::getLanguages());
        debug(App::$app->getProperties());
    }
}