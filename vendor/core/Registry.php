<?php


namespace vendor\core;


class Registry
{
    public static $objects = [];
    protected static $instance;

    protected function __construct()
    {
       foreach ($config['components'] as $name => $component) {

       }
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}