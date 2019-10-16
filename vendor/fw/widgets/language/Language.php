<?php

namespace fw\widgets\language;

use app\models\Languages;

class Language
{
    protected $tpl;
    protected $languages;
    protected $language;

    public function __construct()
    {
        $this->tpl = __DIR__ . 'lang_tpl.php';
        $this->run();
    }

    public function run()
    {

    }

    public static function getLanguages()
    {
        $lang = new Languages();
        return $lang->findBySql('SELECT code, title, base FROM languages ORDER BY base DESC');
    }

    public static function getLanguage($languages)
    {

    }

    protected function getHtml()
    {

    }
}