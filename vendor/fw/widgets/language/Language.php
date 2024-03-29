<?php

namespace fw\widgets\language;

use app\models\Languages;
use fw\core\App;

class Language
{
    protected $tpl;
    protected $languages;
    protected $language;

    public function __construct()
    {
        $this->tpl = __DIR__ . '/lang_tpl.php';
        $this->run();
    }

    public function run()
    {
        $this->languages = App::$app->getProperty('langs');
        $this->language = App::$app->getProperty('lang');
        echo $this->getHtml();
    }

    public static function getLanguages()
    {
        $lang = new Languages();
        $languages = $lang->findBySql('SELECT code, title, base FROM languages ORDER BY base DESC');
        $arr = [];
        foreach ($languages as $lang) {
            $arr[$lang->code] = (array)$lang;
        }
        return $arr;
    }

    public static function getLanguage($languages)
    {
        if (isset($_COOKIE['lang']) && array_key_exists($_COOKIE['lang'], $languages)) {
            $key = $_COOKIE['lang'];
        } else {
            $key = key($languages);
        }
        $lang = $languages[$key];
        $lang['code'] = $key;
        return $lang;
    }

    protected function getHtml()
    {
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}