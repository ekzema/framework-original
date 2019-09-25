<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25.09.2019
 * Time: 10:46
 */

namespace vendor\core;

use http\Env\Response;
use vendor\core\Registry;

class App
{
    public static $app;

    public function __construct()
    {
        self::$app = Registry::instance();
    }
}