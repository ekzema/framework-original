<?php


namespace vendor\core;


class Registry
{
    public static $objects = [];
    protected static $instance;

    protected function __construct()
    {
       require_once ROOT . '/config/config.php';
       foreach ($config['components'] as $name => $component) {
            self::$objects[$name] =  new $component;
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