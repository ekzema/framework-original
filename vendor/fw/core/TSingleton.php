<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 26.09.2019
 * Time: 14:36
 */

namespace vendor\core;


trait TSingleton
{
    protected static $instance;

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

}