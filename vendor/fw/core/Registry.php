<?php

namespace fw\core;

class Registry
{
    use TSingleton;
    protected static $properties = [];
//    public static $objects = [];

//    protected function __construct()
//    {
//       require_once ROOT . '/config/config.php';
//       foreach ($config['components'] as $name => $component) {
//            self::$objects[$name] =  new $component;
//       }
//    }

    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }

    public function getProperty($name)
    {
        if (isset(self::$properties[$name]))
            return self::$properties[$name];
        return null;
    }

    public function getProperties()
    {
        return self::$properties;
    }

//    public function __get($name)
//    {
//        if (is_object(self::$objects[$name]))
//            return self::$objects[$name];
//    }
//
//    public function __set($name, $object)
//    {
//        if (isset(self::$objects[$name]))
//            self::$objects[$name] = new $object;
//    }
}